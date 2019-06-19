<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {

    public function user() {
        return $this->belongsTo(User::class);
    }
}