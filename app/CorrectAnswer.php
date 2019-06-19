<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrectAnswer extends Model {

    public function quiz() {
        return $this->belongsTo(Test::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }
}