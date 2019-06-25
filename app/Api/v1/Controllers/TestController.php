<?php

namespace App\Api\v1\Controllers;

use Illuminate\Support\Facades\Config;
use Mailgun\Mailgun;

class TestController extends BaseController {

    public function test() {

        $mgClient = new Mailgun(Config::get('services.mailgun.secret'));
        $domain = Config::get('services.mailgun.domain');

        $result = $mgClient->sendMessage($domain,  array(
            'from'	=> 'mailgun@' . $domain,
            'to'	=> 'adeshkhanna271@gmail.com',
            'subject' => 'Hello',
            'text'	=> 'Testing some Mailgun awesomness!'
        ));
    }
}

