<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Requests\GetAnswerRequest;
use App\Services\PointsService;

class PointsController extends BaseController {
    protected $pointsService;

    public function __construct() {
        $this->pointsService = new PointsService();
    }

    public function totalPoints(GetAnswerRequest $request) {
        $point = $this->pointsService->getTotalPoints($request);
    }
}