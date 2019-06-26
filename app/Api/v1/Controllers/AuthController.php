<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Exceptions\InvalidCredentialsException;
use App\Api\v1\Requests\CreateUserRequest;
use App\Api\v1\Requests\Request;
use App\Api\v1\Transformers\UserTransformer;
use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Mailgun\Mailgun;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController {

    protected $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function register(CreateUserRequest $request) {
        $user = $this->userService->createUser($request);

        $mgClient = new Mailgun(Config::get('services.mailgun.secret'));
        $domain = Config::get('services.mailgun.domain');
        $mgClient->sendMessage($domain,  array(
            'from'	=> 'mailgun@' . $domain,
            'to'	=> $user->email,
            'subject' => 'Greetings',
            'text'	=> 'Thank You '.$user->name.' for registering yourself on Quizzeria, world\'s best online quiz portal. Happy Quizzing :)'
        ));

        return $this->response->item($user, new UserTransformer());
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            throw new InvalidCredentialsException();
        }

        if (Hash::check($user->password, $request->get('password'))) {
            $token = JWTAuth::fromUser($user);
        } else {
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    throw new InvalidCredentialsException();
                }
            } catch (JWTException $e) {
                throw new InvalidCredentialsException();
            }
        }

        return [
            'token'          => $token,
            'user'           => (new UserTransformer())->transform($user)
        ];
    }

    public function logout() {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}