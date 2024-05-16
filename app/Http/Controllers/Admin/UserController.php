<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserValidationRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user, $role;
    public function __construct(User $user, Role $role)
    {
        $this->user=$user;
        $this->role=$role;
    }
    public function index()
    {
        $users=$this->user->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles= $this->role->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserValidationRequest $request)
    {
        $user=$request->validated();
        $user['password']= Hash::make($user['password']);
        $this->user->create($user);
        return redirect()->route('user.index')->with('message', 'Successfully Added!!!!');
    }

    public function show( $id)
    {
        $user=$this->user->findOrFail($id);
        return view('admin.users.show',compact('user'));

    }

    public function edit( $id)
    {
        $roles=$this->role->all();
        $user=$this->user->findOrFail($id);

        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(UserValidationRequest $request,  $id)
    {
        $user=$this->user->findOrFail($id);
        $user->update($request->validated());
        return redirect()->route('user.index')->with('message', 'Successfully Updated!!!!');;
    }

    public function destroy( $id)
    {
        $user=$this->user->findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
