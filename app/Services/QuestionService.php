<?php

namespace App\Services;


use App\Services\Contracts\CreateFilteredQuestionContract;
use Curl\Curl;

class QuestionService {

    public function getRandomQuestions() {
        $curl = new Curl();
        $url = 'https://opentdb.com/api.php?amount=10';
        $curl->get($url);

        $results = json_decode(json_encode($curl->response))->results;

        return array_map(function($result) {
            return [
                'question' => $result->question,
                'correct_answer'  => $result->correct_answer,
                'incorrect_answer' =>    $result->incorrect_answers
            ];
        }, $results);
    }

    public function getCategory() {
        $curl = new Curl();
        $url = 'https://opentdb.com/api_category.php';
        $curl->get($url);

        $categories = json_decode(json_encode(($curl->response)))->trivia_categories;

        return array_map(function($category){
            return $category->name;

        }, $categories);

    }

    public function getCategoryId($category) {
        $curl = new Curl();
        $url = 'https://opentdb.com/api_category.php';
        $curl->get($url);

        $categories = json_decode(json_encode(($curl->response)))->trivia_categories;

        if($categories->name === $category) {
            return $categories->id;
        }
    }

    public function getFilteredQuestions(CreateFilteredQuestionContract $contract) {
        $curl = new Curl();
        $url = 'https://opentdb.com/api.php?amount=10';

         if($contract->hasType()) {
             $url = $url . '&type=' . $contract->getType();
         }

        if($contract->hasDifficulty()) {
            $url = $url . '&difficulty=' . $contract->getDifficulty();
        }

        if($contract->hasCategory()) {
            $category_id = $this->getCategoryId($contract->getCategory());
            $url = $url . '&category=' . $category_id;
        }

        $curl->get($url);

        $results = json_decode(json_encode($curl->response))->results;

        return array_map(function($result) {
            return [
                'question' => $result->question,
                'correct_answer'  => $result->correct_answer,
                'incorrect_answer' =>    $result->incorrect_answers
            ];
        }, $results);
    }
}