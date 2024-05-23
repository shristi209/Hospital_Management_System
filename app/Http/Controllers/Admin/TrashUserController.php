<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\view\view;
use App\Models\User;

class TrashUserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user=$user;
        $this->middleware('permission:user trash', ['only'=> ['restoreuser', 'deleteuser']]);
    }

    public function index()
    {
        $users=$this->user->onlyTrashed()->get();
        return view('admin.users.trash', compact('users'));
    }

    public function restoreuser($id)
    {
        $user=$this->user->where('id', $id);
            $user->restore();
            return redirect()->route('user.index');

    }
    public function deleteuser($id)
    {
        $this->user->where('id', $id)->forceDelete();
        return redirect()->route('usertrash');
    }
}
