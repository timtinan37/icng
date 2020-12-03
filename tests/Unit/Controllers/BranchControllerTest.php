<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Http\Requests\BranchRequest;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class BranchControllerTest extends TestCase
{
    private $user;

    public function testCreateRequiresAuthentication()
    {
        // act
        $response = $this->get(route('branches.create'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testCreateRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        
        // act
        $response = $this->actingAs($this->user)->get(route('branches.create'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testCreateReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();        
        View::shouldReceive('make')
            ->once()
            ->with('branches.create')
            ->andReturn('branches.create');

        // act
        $response = $this->get(route('branches.create'));

        // assert
        $this->assertEquals('branches.create', $response->getContent());
    }

    public function testStoreRequiresAuthentication()
    {
        // act
        $response = $this->post(route('branches.store'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testStoreRequiresAuthorization()
    {
        // arrange
        $this->user = new User;

        // act
        $response = $this->actingAs($this->user)->post(route('branches.store'));

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
        $response = $this->post(route('branches.store'));

        // assert
        $response->assertSessionHasErrors([
            'name',
            'email',
            'phone_number',
            'fax_number',
            'address'
        ]);
    }

    public function testStoreSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(BranchRequest::class);
        $this->mock(Branch::class, function ($mock)
        {
            $mock->shouldReceive('create')->once()->andReturn((object) ['id' => 'id']);
        });

        // act
        $response = $this->post(route('branches.store'));

        // assert
        $response->assertRedirect(route('branches.show', 'id'));
        $response->assertSessionHas('status', 'Branch created.');
    }

    public function testEditRequiresAuthentication()
    {
        // act
        $response = $this->get(route('branches.edit', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testEditRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Branch::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')
                ->once()
                ->with('id', null)
                ->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->get(route('branches.edit', 'id'));

        // assert
        $response->assertStatus(403);

        // cleanup
        $this->user = null;
    }

    public function testEditReturnsCorrectViewFile()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(Branch::class, function ($mock)
        {
            View::shouldReceive('make')->once()->with('branches.edit', ['branch' => $mock])->andReturn('branches.edit');
        });
        
        // act
        $response = $this->get(route('branches.edit', 'id'));

        // assert
        $this->assertEquals('branches.edit', $response->getContent());
    }

    public function testUpdateRequiresAuthentication()
    {
        // act
        $response = $this->patch(route('branches.update', 'id'));

        // assert
        $response->assertRedirect(route('login'));
    }

    public function testUpdateRequiresAuthorization()
    {
        // arrange
        $this->user = new User;
        $this->mock(Branch::class, function ($mock)
        {
            $mock->shouldReceive('resolveRouteBinding')->once()->with('id', null)->andReturn($mock);
        });

        // act
        $response = $this->actingAs($this->user)->patch(route('branches.update', 'id'));

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
        $response = $this->patch(route('branches.update', 'id'));

        // assert
        $response->assertSessionHasErrors(['name', 'email', 'address', 'phone_number', 'fax_number']);
    }

    public function testUpdateSuccess()
    {
        // arrange
        $this->withoutMiddleware();
        $this->mock(BranchRequest::class);
        $this->mock(Branch::class, function ($mock)
        {
            $mock->shouldReceive('fill')->once();
            $mock->shouldReceive('save')->once();
            $mock->shouldReceive('getAttribute')->once()->andReturn('id');
        });

        // act
        $response = $this->patch(route('branches.update', 'id'));

        // assert
        $response->assertRedirect(route('branches.show', 'id'));
        $response->assertSessionHas('status', 'Branch updated.');
    }
}
