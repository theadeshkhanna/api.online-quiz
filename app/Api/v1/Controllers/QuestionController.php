<?php

namespace App\Api\v1\Controllers;

use App\Services\QuestionService;

class QuestionController extends BaseController {
    protected $questionService;

    public function __construct() {
        $this->questionService = new QuestionService();
    }

    public function getRandom() {
        return [
            'test' => $this->questionService->getRandomQuestions()
        ];
    }
}