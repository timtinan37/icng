<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{
    Redirect,
    View,
};
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
        $response->assertSessionHas('status', 'User created.');
    }

    public function testEditRequiresAuthentication()
    {
        // act
        $response = $this->get(route('users.edit', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testEditRequiresAuthorization()
    {
        // arrange
        $this->user = new User();
        $this->mock(User::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')
                ->once()
                ->with('id', null)
                ->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->get(route('users.edit', 'id'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testEditReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(User::class, function ($mock)
        {   
            View::shouldReceive('make')->once()->with('users.edit', ['user' => $mock])->andReturn('users.edit');
        });

        // act
        $response = $this->get(route('users.edit', 'id'));

        // assert
        $this->assertEquals('users.edit', $response->getContent());
    }

    public function testUpdateRequiresAuthentication()
    {
        // act
        $response = $this->patch(route('users.update', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testUpdateRequiresAuthorization()
    {
        // arrange
        $this->user = new User();
        $this->mock(User::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')
                ->once()
                ->with('id', null)
                ->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->patch(route('users.update', 'id'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testUpdateFailsWithoutRequiredFields()
    {
        // arrange
        $this->withoutMiddleware();

        // act
        $response = $this->patch(route('users.update', 'id'));

        // assert
        $response->assertSessionHasErrors(['name', 'email', 'password', 'password_confirmation']);
    }

    public function testUpdateSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(UserRequest::class);
        $this->mock(User::class, function ($mock)
        {
            $mock->shouldReceive('update')->once();
            $mock->shouldReceive('getAttribute')->once()->with('id')->andReturn('id');
        });

        // act
        $response = $this->patch(route('users.update', 'id'));
        
        // assert
        $response->assertRedirect(route('users.show', 'id'));
        $response->assertSessionHas('status', 'User updated.');
    }
}
