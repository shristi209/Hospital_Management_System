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
        $this->middleware('Permission:create user', ['only' => ['create', 'store']]);
        $this->middleware('Permission:edit user', ['only' => ['edit', 'update']]);
        $this->middleware('Permission:view user',['only' => ['show']]);
        $this->middleware('Permission:delete user',['only' => ['destroy']]);

    }
    public function index()
    {
        $users=$this->user->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserValidationRequest $request)
    {
        // dd($request);
        $validatedData = $request->validated();
        // dd($validatedData);
        $userData = [
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ];
        $user = $this->user->create($userData);

            // dd($validatedData['role_id']);
        $user->syncRoles($validatedData['role_id']);
        // dd($user->syncRoles($validatedData['role_id']));

        return redirect()->route('user.index')->with('message', 'Successfully reated user with role!!!!');
    }

    public function show( $id)
    {
        $user=$this->user->findOrFail($id);
        return view('admin.users.show',compact('user'));

    }

    public function edit( $id)
    {
        // return $id;
        $user=$this->user->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserValidationRequest $request,  $id)
    {
        $validatedData=$request->validated();

        $userData=$this->user->findOrFail($id);

        $user=[
            'username'=>$validatedData['username'],
            'email'=>$validatedData['email'],
        ];

        $userData->update($user);
        $userData->syncRoles($validatedData['role_id']);

        return redirect()->route('user.index')->with('message', 'Successfully Updated!!!!');;
    }

    public function destroy( $id)
    {
        $user=$this->user->findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
