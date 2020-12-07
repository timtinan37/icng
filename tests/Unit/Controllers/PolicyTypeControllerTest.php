<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Models\PolicyType;
use App\Http\Requests\PolicyTypeRequest;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class PolicyTypeControllerTest extends TestCase
{
	private $user;

    public function testCreateRequiresAuthentication()
    {
    	// act
        $response = $this->get(route('policy-types.create'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testCreateRequiresAuthorization()
    {
    	// arrange
    	$this->user = new User;

    	// act
    	$response = $this->actingAs($this->user)->get(route('policy-types.create'));

    	// assert
    	$response->assertStatus(403);

    	// cleanup
    	$this->user = null;
    }

    public function testCreateReturnsCorrectViewFile()
    {
    	// arrange
    	$this->withoutMiddleware();
    	View::shouldReceive('make')->with('policy-types.create')->once()->andReturn('policy-types.create');

    	// act
    	$response = $this->get(route('policy-types.create'));

    	// assert
    	$this->assertEquals('policy-types.create', $response->getContent());
    }

    public function testStoreRequiresAuthentication()
    {
        // act
        $response = $this->post(route('policy-types.store'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testStoreRequiresAuthorization()
    {
        // arrange
        $this->user = new User;

        // act
        $response = $this->actingAs($this->user)->post(route('policy-types.store'));

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
        $response = $this->post(route('policy-types.store'));

        // assert
        $response->assertSessionHasErrors(['name', 'unique_code']);
    }

    public function testStoreSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(PolicyTypeRequest::class);
        $this->mock(PolicyType::class, function ($mock)
        {
            $mock->shouldReceive('create')
            ->once()
            ->andReturn((object) ['id' => 'id']);
        });

        // act
        $response = $this->post(route('policy-types.store'));

        // assert
        $response->assertRedirect(route('policy-types.show', 'id'));
        $response->assertSessionHas(['status' => 'Policy Type created.']);
    }

    public function testEditRequiresAuthentication()
    {
        // act
        $response = $this->get(route('policy-types.edit', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testEditRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(PolicyType::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')
                ->once()
                ->with('id', null)
                ->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->get(route('policy-types.edit', 'id'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testEditReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(PolicyType::class, function ($mock)
        {
            View::shouldReceive('make')
            ->once()
            ->with('policy-types.edit', ['policyType' => $mock])
            ->andReturn('policy-types.edit');
        });

        // act
        $response = $this->get(route('policy-types.edit', 'id'));

        // assert
        $this->assertEquals('policy-types.edit', $response->getContent());
    }

    public function testUpdateRequiresAuthentication()
    {
        // act
        $response = $this->patch(route('policy-types.update', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testUpdateRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(PolicyType::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')->once()->with('id', null)->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->patch(route('policy-types.update', 'id'));

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
        $response = $this->patch(route('policy-types.update', 'id'));

        // assert
        $response->assertSessionHasErrors(['name', 'unique_code']);
    }

    public function testUpdateSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(PolicyTypeRequest::class);
        $this->mock(PolicyType::class, function ($mock)
        {
            $mock->shouldReceive('update')->once();
            $mock->shouldReceive('getAttribute')->once()->andReturn('id');
        });

        // act
        $response = $this->patch(route('policy-types.update', 'id'));

        // assert
        $response->assertRedirect(route('policy-types.show', 'id'));
        $response->assertSessionHas('status', 'Policy Type updated.');
    }
}
