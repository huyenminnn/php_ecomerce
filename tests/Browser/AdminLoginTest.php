<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminLoginTest extends DuskTestCase
{
    public function test_admin_login_successfully()
    {
        $this->browse(function ($browser) {
            $browser->visit('admin/login')
                ->type('email', 'huyenttm.13@gmail.com')
                ->type('password', '12345678')
                ->click('.login100-form-btn')
                ->assertPathIs('/admin/products')
                ->assertRouteIs('products.index')
                ->assertSee('Product');
        });
    }
}
