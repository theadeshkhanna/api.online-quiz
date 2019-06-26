<?php

namespace App\Api\v1\Requests;

use App\Services\Contracts\CreateUserContract;

class CreateUserRequest extends Request implements CreateUserContract {

    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const COUNTRY = 'country';
    const CITY = 'city';
    const MOB = 'mobile_number';

    public function rules() {
        return [
          self::NAME   => 'required',
          self::EMAIL  => 'required|email',
          self::PASSWORD => 'required',
          self::COUNTRY =>  'required',
          self::MOB     =>  'required'
        ];
    }

    public function getName() {
        return $this->get(self::NAME);
    }

    public function getEmail() {
        return $this->get(self::EMAIL);
    }

    public function getPassword() {
        return $this->get(self::PASSWORD);
    }

    public function getCountry() {
        return $this->get(self::COUNTRY);
    }

    public function getCity() {
        return $this->get(self::CITY);
    }

    public function getMob() {
        return $this->get(self::MOB);
    }
}