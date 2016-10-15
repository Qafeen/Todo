<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modelizer\Selenium\SeleniumTestCase;

class UserRegistrationTest extends SeleniumTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $form = [
            'name' => 'Mudassir Mohammed Rafique Shaikh',
            'email' => 'hello@mudasir.me',
            'aadhaarId' => 795581835831,
            'pincode' => 400052,
            'password' => 'lorm',
            'password_confirmation' => 'lorm',
        ];

        $this->visit('/register')
             ->submitForm('[name="submit"]', $form)
             ->hold(3);
    }
}
