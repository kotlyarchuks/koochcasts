<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /** @test * */
    function user_can_see_error_if_puts_wrong_credentials()
    {
        factory(User::class)->create(['email' => 'test@test.com']);

        $this->post('/login', ['email' => 'test2@test.com', 'password' => 'secret'])
            ->assertStatus(422)
            ->assertSee('Wrong email or password');
    }

    /** @test * */
    function user_can_see_his_name_if_puts_right_credentials()
    {
        factory(User::class)->create(['email' => 'test@test.com', 'name' => 'Bob', 'password' => bcrypt('test')]);

        $this->post('/login', ['email' => 'test@test.com', 'password' => 'test'])
            ->assertStatus(200)
            ->assertJson(['status' => 'ok'])
            ->assertSessionHas('success');
    }
}
