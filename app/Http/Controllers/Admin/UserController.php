<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserValidationRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserValidationRequest $request)
    {
        $user=$request->validated();
        $user['password']= Hash::make($user['password']);
        User::create($user);
        return redirect()->route('user.index')->with('message', 'Successfully Added!!!!');
    }

    public function show( $id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.show',compact('user'));

    }

    public function edit( $id)
    {
        $roles=Role::all();
        $user=User::findOrFail($id);

        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(UserValidationRequest $request,  $id)
    {
        $user=User::findOrFail($id);
        $user->update($request->validated());
        return redirect()->route('user.index')->with('message', 'Successfully Updated!!!!');;
    }

    public function destroy( $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
