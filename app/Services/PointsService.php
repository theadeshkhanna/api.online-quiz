<?php

namespace App\Services;

use App\Question;
use App\Services\Contracts\GetAnswerContract;

class PointsService {

    public function getTotalPoints(GetAnswerContract $contract, $id) {
        $questions[] = Question::where('test_id', $id);
        for($i=0; $i<10;$i++) {
            if($contract->getAnswerOne() == $questions[$i]);
        }
    }
}