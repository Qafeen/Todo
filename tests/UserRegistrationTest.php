<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modelizer\Selenium\SeleniumTestCase;

class UserRegistrationTest extends SeleniumTestCase
{
    /**
     * Registration via aadhaar API
     *
     * @return void
     */
    public function testAadhaarRegistration()
    {
        $form = [
            'name' => 'Mudassir Mohammed',
            'email' => 'hello1@mudasir.me',
            'aadhaarId' => 795581835831,
            'pincode' => 400052,
            'password' => 'sts@123',
            'password-confirm' => 'sts@123',
        ];

        $this->visit('/register')
             ->submitForm('#register', $form)
             ->hold(10);
    }
}
