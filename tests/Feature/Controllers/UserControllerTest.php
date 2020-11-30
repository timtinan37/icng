<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    private $user;

    public function testCreateRequiresAuthentication()
    {
        // act
        $response = $this->get(route('users.create'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testCreateRequiresAuthorization()
    {
        // arrange
        $this->user = new User();

        // act
        $response = $this->actingAs($this->user)->get(route('users.create'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testCreateReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();
        View::shouldReceive('make')->once()->with('users.create')->andReturn('users.create');

        // act
        $response = $this->get(route('users.create'));

        // assert
        $this->assertEquals('users.create', $response->getContent());
    }

    public function testStoreRequiresAuthentication()
    {
        // act
        $response = $this->post(route('users.store'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testStoreRequiresAuthorization()
    {
        // arrange
        $this->user = new User();

        // act
        $response = $this->actingAs($this->user)->post(route('users.store'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testStoreFailsWithoutRequiredFields()
    {
        // arrange
        $this->withoutMiddleware();

        // act
        $response = $this->post(route('users.store'));

        // assert
        $response->assertSessionHasErrors(['name', 'email', 'password', 'password_confirmation']);
    }

    public function testStoreSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(UserRequest::class);
        $this->mock(User::class, function ($mock)
        {
            $mock->shouldReceive('create')
            ->once()
            ->andReturn((object) ['id' => 'id']);
        });

        // act
        $response = $this->post(route('users.store'));

        // assert
        $response->assertRedirect(route('users.show', 'id'));
    }
}
