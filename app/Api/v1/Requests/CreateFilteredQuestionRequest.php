<?php

namespace App\Api\v1\Requests;

use App\Services\Contracts\CreateFilteredQuestionContract;

class CreateFilteredQuestionRequest extends Request implements CreateFilteredQuestionContract {

    const CATEGORY = 'category';
    const DIFFICULTY = 'difficulty';
    const TYPE = 'type';

    public function getCategory() {
        return $this->get(self::CATEGORY);
    }

    public function getDifficulty() {
        return $this->get(self::DIFFICULTY);
    }

    public function getType() {
        return $this->get(self::TYPE);
    }

    public function hasCategory() {
        return $this->get(self::CATEGORY);
    }

    public function hasDifficulty() {
        return $this->get(self::DIFFICULTY);
    }

    public function hasType() {
        return $this->get(self::TYPE);
    }
}