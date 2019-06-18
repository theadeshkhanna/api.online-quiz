<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Requests\CreateFilteredQuestionRequest;
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

    public function fetchCategory() {
        return [
          'categories' => $this->questionService->getCategory()
        ];
    }

    public function getFiltered(CreateFilteredQuestionRequest $request) {
        $this->questionService->getFilteredQuestions($request);
    }
}