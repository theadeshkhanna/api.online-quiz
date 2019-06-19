<?php

namespace App\Api\v1\Requests;

use App\Services\Contracts\GetAnswerContract;

class GetAnswerRequest extends Request implements GetAnswerContract {

    const ANSWER_ONE = 'answer_one';
    const ANSWER_TWO = 'answer_two';
    const ANSWER_THREE = 'answer_three';
    const ANSWER_FOUR = 'answer_four';
    const ANSWER_FIVE = 'answer_five';
    const ANSWER_SIX = 'answer_six';
    const ANSWER_SEVEN = 'answer_seven';
    const ANSWER_EIGHT = 'answer_eight';
    const ANSWER_NINE = 'answer_nine';
    const ANSWER_TEN = 'answer_ten';

    public function getAnswerOne() {
        return $this->get(self::ANSWER_ONE);
    }

    public function getAnswerTwo() {
        return $this->get(self::ANSWER_TWO);
    }

    public function getAnswerThree() {
        return $this->get(self::ANSWER_THREE);
    }

    public function getAnswerFour() {
        return $this->get(self::ANSWER_FOUR);
    }

    public function getAnswerFive() {
        return $this->get(self::ANSWER_FIVE);
    }

    public function getAnswerSix() {
        return $this->get(self::ANSWER_SIX);
    }

    public function getAnswerSeven() {
        return $this->get(self::ANSWER_SEVEN);
    }

    public function getAnswerEight() {
        return $this->get(self::ANSWER_EIGHT);
    }

    public function getAnswerNine() {
        return $this->get(self::ANSWER_NINE);
    }

    public function getAnswerTen() {
        return $this->get(self::ANSWER_TEN);
    }

}