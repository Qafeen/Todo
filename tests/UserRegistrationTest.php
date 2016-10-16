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
            'name' => 'Mufaddal',
            'email' => 'hello2@mudasir.me',
            'aadhaarId' => 441197055733,
            'pincode' => 400059,
            'password' => 'sts@123',
            'password-confirm' => 'sts@123',
        ];

        $this->visit('/register')
             ->submitForm('#register', $form)
             ->hold(20);
    }
}
