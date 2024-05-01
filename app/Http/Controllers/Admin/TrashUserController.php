<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\view\view;
use App\Models\User;

class TrashUserController extends Controller
{
    public function index(){
        $users=User::onlyTrashed()->get();
        return view('admin.users.trash', compact('users'));
    }

    public function restoreuser($id)
    {
        $user=User::where('id', $id);
            $user->restore();
            return redirect()->route('user.index');

    }
    public function deleteuser($id)
    {
        User::where('id', $id)->forceDelete();
        return redirect()->route('usertrash');
    }
}
