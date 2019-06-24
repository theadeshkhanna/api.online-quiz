<?php

namespace App\Services;

use App\Question;
use App\Services\Contracts\GetAnswerContract;
use App\User;

class PointsService {

    public function getTotalPoints(GetAnswerContract $contract, $id, $user) {
        $ans = Question::where('test_id', $id)->get('correct_answer');
        $points = $user->points;

        if($ans[0]['correct_answer'] == $contract->getAnswerOne()) {
            ++$points;
        }

        if($ans[1]['correct_answer'] == $contract->getAnswerTwo()) {
            ++$points;
        }

        if($ans[2]['correct_answer'] == $contract->getAnswerThree()) {
            ++$points;
        }

        if($ans[3]['correct_answer'] == $contract->getAnswerFour()) {
            ++$points;
        }

        if($ans[4]['correct_answer'] == $contract->getAnswerFive()) {
            ++$points;
        }

        if($ans[5]['correct_answer'] == $contract->getAnswerSix()) {
            ++$points;
        }

        if($ans[6]['correct_answer'] == $contract->getAnswerSeven()) {
            ++$points;
        }

        if($ans[7]['correct_answer'] == $contract->getAnswerEight()) {
            ++$points;
        }

        if($ans[8]['correct_answer'] == $contract->getAnswerNine()) {
            ++$points;
        }

        if($ans[9]['correct_answer'] == $contract->getAnswerTen()) {
            ++$points;
        }

        $user->points = $points;
        $user->save();

        return $user;
    }

    public function getGameStats($user) {
        $points = $user->points;
        $tests = $user->no_of_tests;

        $avg_points = $points/$tests;

        return [
          'points' => $points,
          'tests' => $tests,
          'avg points per game' => $avg_points
        ];
    }
}