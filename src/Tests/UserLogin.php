<?php

namespace TomatoPHP\TomatoDusk\Tests;

use TomatoPHP\TomatoDusk\Services\Components\Log;
use TomatoPHP\TomatoDusk\Services\Core\Browser;
use TomatoPHP\TomatoDusk\Services\Core\Chrome;

class UserLogin
{
    private Chrome $dusk;

    public static function make():self
    {
        return new self();
    }

    public function __construct()
    {
        $this->dusk = Browser::make('web')->run();
    }

    public function run(): void
    {
        try {
            $this->dusk->browse(function ($browser) {
                //Sad Empty Inputs :(
                $browser->visit(url('admin/login'));
                $browser->pause(2000);
                $browser->click("button[class^='rounded-md']");
                $browser->pause(2000);
                Log::make("Login Empty Validation and pass")->save();

                //Sad Bad Value Email :(
                $browser->visit(url('admin/login'));
                $browser->pause(2000);
                $browser->type('#email', 'admin.....32');
                $browser->pause(2000);
                $browser->type('#password', 'QTS@2022');
                $browser->pause(2000);
                $browser->click("button[class^='rounded-md']");
                $browser->pause(2000);
                Log::make("Login Bad Value Email and pass")->save();

                //Sad Bad Value Email/Password :(
                $browser->visit(url('admin/login'));
                $browser->pause(2000);
                $browser->type('#email', 'admin@admin.io');
                $browser->pause(2000);
                $browser->type('#password', 'QTS@2021');
                $browser->pause(2000);
                $browser->click("button[class^='rounded-md']");
                $browser->pause(2000);
                Log::make("Login Bad Value Email/Password and pass")->save();

                //Happy :)
                $browser->visit(url('admin/login'));
                $browser->pause(2000);
                $browser->type('#email', 'admin@admin.com');
                $browser->pause(2000);
                $browser->type('#password', 'QTS@2022');
                $browser->pause(2000);
                $browser->click("button[class^='rounded-md']");
                $browser->pause(2000);
                Log::make("Login Success and pass")->save();
            });
        } catch (\Exception $e) {
            if (!strpos($e, 'file_put_contents')) {
                Log::make("Login Failed Error: " . $e)->type('danger')->save();
            }
        }

        $this->dusk->stop();
    }
}
