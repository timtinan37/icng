<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Models\Carriage;
use App\Http\Requests\CarriageRequest;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class CarriageControllerTest extends TestCase
{
	private $user;

	public function testCreateRequiresAuthentication()
	{
		// act
		$response = $this->get(route('carriages.create'));

		// assert
		$response->assertRedirect(route('login'));
	}

	public function testCreateRequiresAuthorization()
	{
		// arrange
		$this->user = new User;

		// act
		$response = $this->actingAs($this->user)->get(route('carriages.create'));

		// assert
		$response->assertStatus(403);

		// cleanup
		$this->user = null;
	}
    public function testCreateReturnsCorrectViewFile()
    {
    	// arrange
    	$this->withoutMiddleware();
    	View::shouldReceive('make')->with('carriages.create')->once()->andReturn('carriages.create');

    	// act
    	$response = $this->get(route('carriages.create'));

    	// assert
    	$this->assertEquals('carriages.create', $response->getContent());
    }

    public function testStoreRequiresAuthentication()
    {
        // act
        $response = $this->post(route('carriages.store'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testStoreRequiresAuthorization()
    {
        // arrange
        $this->user = new User;

        // act
        $response = $this->actingAs($this->user)->post(route('carriages.store'));

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
        $response = $this->post(route('carriages.store'));

        // assert
        $response->assertSessionHasErrors(['name']);
    }

    public function testStoreSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(CarriageRequest::class);
        $this->mock(Carriage::class, function ($mock)
        {
            $mock->shouldReceive('create')
            ->once()
            ->andReturn((object) ['id' => 'id']);
        });

        // act
        $response = $this->post(route('carriages.store'));

        // assert
        $response->assertRedirect(route('carriages.show', 'id'));
        $response->assertSessionHas(['status' => 'Carriage created.']);
    }

    public function testEditRequiresAuthentication()
    {
        // act
        $response = $this->get(route('carriages.edit', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testEditRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Carriage::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')
                ->once()
                ->with('id', null)
                ->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->get(route('carriages.edit', 'id'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testEditReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(Carriage::class, function ($mock)
        {
            View::shouldReceive('make')
            ->once()
            ->with('carriages.edit', ['carriage' => $mock])
            ->andReturn('carriages.edit');
        });

        // act
        $response = $this->get(route('carriages.edit', 'id'));

        // assert
        $this->assertEquals('carriages.edit', $response->getContent());
    }

    public function testUpdateRequiresAuthentication()
    {
        // act
        $response = $this->patch(route('carriages.update', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testUpdateRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Carriage::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')->once()->with('id', null)->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->patch(route('carriages.update', 'id'));

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
        $response = $this->patch(route('carriages.update', 'id'));

        // assert
        $response->assertSessionHasErrors(['name']);
    }

    public function testUpdateSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(CarriageRequest::class);
        $this->mock(Carriage::class, function ($mock)
        {
            $mock->shouldReceive('update')->once();
            $mock->shouldReceive('getAttribute')->once()->andReturn('id');
        });

        // act
        $response = $this->patch(route('carriages.update', 'id'));

        // assert
        $response->assertRedirect(route('carriages.show', 'id'));
        $response->assertSessionHas('status', 'Carriage updated.');
    }
}
