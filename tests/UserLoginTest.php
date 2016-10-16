<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modelizer\Selenium\SeleniumTestCase;

class UserLoginTest extends SeleniumTestCase
{
    /**
     * Aadhaar login
     *
     * @return void
     */
    public function testAadhaarLogin()
    {
        $form = [
            'aadhaarId' => 441197055733
        ];

        $this->visit('/aadhaar/login')
             ->submitForm('#aadhaarLogin', $form)
             ->hold(10);
    }
}
