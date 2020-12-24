<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\{
    Hash,
    Redirect,
    View,
    Log,
};

class UserController extends Controller
{
    private $user;
    private $permission;
    
    function __construct(User $user, Permission $permission)
    {
        $this->user = $user;
        $this->permission = $permission;

        $this->authorizeResource(User::class, 'user');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(10);

        return View::make('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->user->create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        return Redirect::route('users.show', $user->id)->with('status', 'User created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return View::make('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return View::make('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        return Redirect::route('users.show', $user->id)->with('status', 'User updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::route('users.index')->with('status', 'User deleted.');
    }

    /**
     * Show all permission of a user
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    
    public function showPermissions(User $user)
    {
        $permissions = $this->permission->all();

        return View::make('users.permissions', compact('permissions', 'user'));
    }

    /**
     * Give permissions to a user
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    
    public function givePermissions(User $user)
    {
        $newPermissions = request()->except('_token');
        $oldPermissions = $user->permissions;
        $user->syncPermissions($newPermissions);

        Log::channel('users')->info("User account permissions updated for $user->name.", ['email' => $user->email, 'user_id' => $user->id, 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")", 'old_permissions' => $oldPermissions->pluck('name'), 'new_permissions' => $user->permissions->pluck('name')]);

        return Redirect::route('users.showPermissions', $user)->with('status', 'Permission settings updated.');
    }
}
