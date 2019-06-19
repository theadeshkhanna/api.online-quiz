<?php

namespace App\Api\v1\Transformers\Traits;

use App\User;

trait UserDetailTrait {
    public function getAttributes(User $user) {
        return [
            'name'  => $user->name,
            'email' => $user->email,
            'country' => $user->country,
            'city'    => $user->city,
            'points'  => (int)$user->points
        ];
    }
}