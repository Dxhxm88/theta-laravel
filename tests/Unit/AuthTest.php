<?php

namespace Tests\Unit;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => "12345678",
            'password_confirmation' => "12345678",
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => 'john',
            'email' => 'john@gmail.com',
        ]);
    }

    public function test_user_password_less_than_eight_char()
    {
        $response = $this->post('/register', [
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => "12345",
            'password_confirmation' => "12345",
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', [
            'name' => 'john',
            'email' => 'john@gmail.com'
        ]);
    }

    public function test_user_email_not_valid()
    {
        $response = $this->post('/register', [
            'name' => 'john',
            'email' => 'johnemail',
            'password' => "12345678",
            'password_confirmation' => "12345678",
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', [
            'name' => 'john',
            'email' => 'johnemail'
        ]);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_fail_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '123456',
        ]);

        $response->assertStatus(302);
        $this->assertGuest();
    }
}
