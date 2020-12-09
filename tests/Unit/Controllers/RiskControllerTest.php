<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Models\Risk;
use App\Http\Requests\RiskRequest;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class RiskControllerTest extends TestCase
{
	private $user;

	public function testCreateRequiresAuthentication()
	{
		// act
		$response = $this->get(route('risks.create'));

		// assert
		$response->assertRedirect(route('login'));
	}

	public function testCreateRequiresAuthorization()
	{
		// arrange
		$this->user = new User;

		// act
		$response = $this->actingAs($this->user)->get(route('risks.create'));

		// assert
		$response->assertStatus(403);

		// cleanup
		$this->user = null;
	}
    public function testCreateReturnsCorrectViewFile()
    {
    	// arrange
    	$this->withoutMiddleware();
    	View::shouldReceive('make')->with('risks.create')->once()->andReturn('risks.create');

    	// act
    	$response = $this->get(route('risks.create'));

    	// assert
    	$this->assertEquals('risks.create', $response->getContent());
    }

    public function testStoreRequiresAuthentication()
    {
        // act
        $response = $this->post(route('risks.store'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testStoreRequiresAuthorization()
    {
        // arrange
        $this->user = new User;

        // act
        $response = $this->actingAs($this->user)->post(route('risks.store'));

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
        $response = $this->post(route('risks.store'));

        // assert
        $response->assertSessionHasErrors(['name']);
    }

    public function testStoreSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(RiskRequest::class);
        $this->mock(Risk::class, function ($mock)
        {
            $mock->shouldReceive('create')
            ->once()
            ->andReturn((object) ['id' => 'id']);
        });

        // act
        $response = $this->post(route('risks.store'));

        // assert
        $response->assertRedirect(route('risks.show', 'id'));
        $response->assertSessionHas(['status' => 'Risk created.']);
    }

    public function testEditRequiresAuthentication()
    {
        // act
        $response = $this->get(route('risks.edit', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testEditRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Risk::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')
                ->once()
                ->with('id', null)
                ->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->get(route('risks.edit', 'id'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testEditReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(Risk::class, function ($mock)
        {
            View::shouldReceive('make')
            ->once()
            ->with('risks.edit', ['risk' => $mock])
            ->andReturn('risks.edit');
        });

        // act
        $response = $this->get(route('risks.edit', 'id'));

        // assert
        $this->assertEquals('risks.edit', $response->getContent());
    }

    public function testUpdateRequiresAuthentication()
    {
        // act
        $response = $this->patch(route('risks.update', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testUpdateRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Risk::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')->once()->with('id', null)->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->patch(route('risks.update', 'id'));

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
        $response = $this->patch(route('risks.update', 'id'));

        // assert
        $response->assertSessionHasErrors(['name']);
    }

    public function testUpdateSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(RiskRequest::class);
        $this->mock(Risk::class, function ($mock)
        {
            $mock->shouldReceive('update')->once();
            $mock->shouldReceive('getAttribute')->once()->andReturn('id');
        });

        // act
        $response = $this->patch(route('risks.update', 'id'));

        // assert
        $response->assertRedirect(route('risks.show', 'id'));
        $response->assertSessionHas('status', 'Risk updated.');
    }
}
