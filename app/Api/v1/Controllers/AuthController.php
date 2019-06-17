<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Requests\CreateUserRequest;
use App\Api\v1\Transformers\UserTransformer;
use App\Services\UserService;

class AuthController extends BaseController {

    protected $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function register(CreateUserRequest $request) {
        $user = $this->userService->createUser($request);
        return $this->response->item($user, new UserTransformer());
    }

}