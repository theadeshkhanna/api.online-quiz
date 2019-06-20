<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Requests\GetAnswerRequest;
use App\Api\v1\Transformers\UserTransformer;
use App\Services\PointsService;
use App\Test;
use Illuminate\Support\Facades\Auth;

class PointsController extends BaseController {
    protected $pointsService;

    public function __construct() {
        $this->pointsService = new PointsService();
    }

    public function totalPoints(GetAnswerRequest $request) {
        $id = Test::orderBy('created_at', 'desc')->first()->id;
        $user = $this->pointsService->getTotalPoints($request, $id, Auth::user());

        return $this->response->item($user, new UserTransformer());
    }
}