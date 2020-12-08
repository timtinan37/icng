<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Models\Transit;
use App\Http\Requests\TransitRequest;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class TransitControllerTest extends TestCase
{
	private $user;

	public function testCreateRequiresAuthentication()
	{
		// act
		$response = $this->get(route('transits.create'));

		// assert
		$response->assertRedirect(route('login'));
	}

	public function testCreateRequiresAuthorization()
	{
		// arrange
		$this->user = new User;

		// act
		$response = $this->actingAs($this->user)->get(route('transits.create'));

		// assert
		$response->assertStatus(403);

		// cleanup
		$this->user = null;
	}
    public function testCreateReturnsCorrectViewFile()
    {
    	// arrange
    	$this->withoutMiddleware();
    	View::shouldReceive('make')->with('transits.create')->once()->andReturn('transits.create');

    	// act
    	$response = $this->get(route('transits.create'));

    	// assert
    	$this->assertEquals('transits.create', $response->getContent());
    }

    public function testStoreRequiresAuthentication()
    {
        // act
        $response = $this->post(route('transits.store'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testStoreRequiresAuthorization()
    {
        // arrange
        $this->user = new User;

        // act
        $response = $this->actingAs($this->user)->post(route('transits.store'));

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
        $response = $this->post(route('transits.store'));

        // assert
        $response->assertSessionHasErrors(['name']);
    }

    public function testStoreSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(TransitRequest::class);
        $this->mock(Transit::class, function ($mock)
        {
            $mock->shouldReceive('create')
            ->once()
            ->andReturn((object) ['id' => 'id']);
        });

        // act
        $response = $this->post(route('transits.store'));

        // assert
        $response->assertRedirect(route('transits.show', 'id'));
        $response->assertSessionHas(['status' => 'Transit created.']);
    }

    public function testEditRequiresAuthentication()
    {
        // act
        $response = $this->get(route('transits.edit', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testEditRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Transit::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')
                ->once()
                ->with('id', null)
                ->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->get(route('transits.edit', 'id'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testEditReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(Transit::class, function ($mock)
        {
            View::shouldReceive('make')
            ->once()
            ->with('transits.edit', ['transit' => $mock])
            ->andReturn('transits.edit');
        });

        // act
        $response = $this->get(route('transits.edit', 'id'));

        // assert
        $this->assertEquals('transits.edit', $response->getContent());
    }

    public function testUpdateRequiresAuthentication()
    {
        // act
        $response = $this->patch(route('transits.update', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testUpdateRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Transit::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')->once()->with('id', null)->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->patch(route('transits.update', 'id'));

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
        $response = $this->patch(route('transits.update', 'id'));

        // assert
        $response->assertSessionHasErrors(['name']);
    }

    public function testUpdateSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(TransitRequest::class);
        $this->mock(Transit::class, function ($mock)
        {
            $mock->shouldReceive('update')->once();
            $mock->shouldReceive('getAttribute')->once()->andReturn('id');
        });

        // act
        $response = $this->patch(route('transits.update', 'id'));

        // assert
        $response->assertRedirect(route('transits.show', 'id'));
        $response->assertSessionHas('status', 'Transit updated.');
    }
}
