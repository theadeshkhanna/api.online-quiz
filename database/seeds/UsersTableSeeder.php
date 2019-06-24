<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run() {
        $user = new User();

        $user->name = 'adam';
        $user->email = 'a@gmail.com';
        $user->password = Hash::make('12345');
        $user->country = 'India';
        $user->city = 'Noida';
        $user->mobile_number = '+918090122748';

        $user->save();
    }
}