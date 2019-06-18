<?php

namespace App\Services\Contracts;

interface CreateFilteredQuestionContract {

    public function getDifficulty();
    public function getCategory();
    public function getType();

    public function hasDifficulty();
    public function hasCategory();
    public function hasType();
}