<?php

namespace App\Services;

use App\Question;
use App\Services\Contracts\GetAnswerContract;
use App\User;

class PointsService {

    public function getTotalPoints(GetAnswerContract $contract, $id, $user) {
        $correct_ans = array(Question::where('test_id', $id)->get('correct_answer'));

        $point = 0;
        for($i=1;$i<=10;$i++) {
            if($contract->getAnswerOne() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerTwo() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerThree() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerFour() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerFive() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerSix() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerSeven() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerEight() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerNine() == $correct_ans[$i]) {
                $point++;
            }else if($contract->getAnswerTen() == $correct_ans[$i]) {
                $point++;
            }else {

            }
        }
        $user->points = $point;
        $user->save();

        return $user;
    }
}