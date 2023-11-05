<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function test_it_will_save_user_when_the_password_is_less_than_eight_characters()
     {
        $user =  ['name' => 'name', 'email' => 'someone@example.com', 'password' => 'pass'];
        $this->post('/api/users', $user);
        $this->assertDatabaseCount('users', 0);
        
     }

     public function testStore()
        {
            $userData = [
                'name' => 'Test User',
                'email' => 'test@example.com'
            ];

            $response = $this->post(route('user.store'), $userData);

          //  $response->assertRedirect(route('user.show', ['id' => 1])); // Adjust with the correct user ID

            $this->assertDatabaseHas('users', ['name' => 'Test User', 'email' => 'test@example.com']);
        }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
