<?php

namespace App\Services\Contracts;

interface  CreateUserContract {

    public function getName();
    public function getEmail();
    public function getPassword();
    public function getCountry();
    public function getCity();
    public function getMob();
    }