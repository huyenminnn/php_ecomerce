<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddProductTest extends DuskTestCase
{
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/login')
                ->type('email', 'huyenttm.13@gmail.com')
                ->type('password', '12345678')
                ->click('.login100-form-btn');

            $browser->visit('/admin/products')
                ->assertSee('Add new product')
                ->click('.btn-add')
                ->whenAvailable('#modal-add', function ($modal) {
                    $modal->assertSee('Add')
                        ->assertButtonEnabled('Add')
                        ->click('.modal-footer > .btn-primary')
                        ->pause(5000)
                        ->assertPathIs('/admin/products')
                        ->assertRouteIs('products.store');
                });
        });
    }
}
