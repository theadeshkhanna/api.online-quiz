<?php

namespace App\Services;

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


}