<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use Illuminate\Foundation\Testing\DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_login()
    {

        $user = factory('App\User')->create([
            'password' => bcrypt('secret')
        ]);

        $this->visit('login')
            ->see('Login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('home');

    }

//    public function test_user_register()
//    {
//        $this->visit('register')
//            ->press('Register')
//            ->see('The Basics')
//            ->type('Jane Doe', 'name')
//            ->type('jane@doe.com', 'email')
//            ->type('1qazxsw2', 'password')
//            ->type('1qazxsw2', 'password_confirmation')
//            ->check('terms')
//            ->press('Register')
//            ->seePageIs('/home');
//
//    }

    public function test_logout()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user)
            ->visit('/home')
            ->click('Logout')
            ->seePageIs('/');
    }
}
