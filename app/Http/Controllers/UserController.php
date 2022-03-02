<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userAdmin');
    }

    public function index(){
        $adminUsers = User::has('roles')->get();
        return view ('admin.users.index', compact ('adminUsers'));
    }

    public function create(){
        $adminUser = new User();
        return view('admin.users.create', compact('adminUser'));

    }

    public function store(Request $request){
        $adminUser = User::create($this->validateDataPass());

        $role_ids = Role::whereIn('name', $request->input('roles', []))->pluck('id');
        $adminUser->roles()->attach($role_ids);

        return redirect('/admin/users');
    }

    public function show(User $user){
        return view ('admin.users.show', compact('user'));
    }

    public function edit(User $user){
        $roles = Role::get();
        return view ('admin.users.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request){
        $user->update($this->validateData());

        $role_ids = Role::whereIn('name', $request->input('roles', []))->pluck('id');
        $user->roles()->sync($role_ids);

        return redirect('/admin/users');
    }


    public function destroy(User $user){
        $user->delete();
        return redirect('/admin/users');
    }

    protected function validateData(){
        return request()->validate([
            'name'=> 'required',
            'email' => 'required',
        ]);
    }

    protected function validateDataPass(){
        return request()->validate([
            'name'=> 'required',
            'email' => 'required | email | unique:users,email',
            'password' => 'required|min:8'
        ]);
    }

}

