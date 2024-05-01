<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\view\view;

class TrashDepartmentController extends Controller
{
    public function index(){
        $departments=Department::onlyTrashed()->get();
        return view('admin.departments.trash', compact('departments'));
    }

     public function restore($id)
    {
        $department=Department::where('id', $id);
        $department->restore();
        return redirect()->route('department.index');
    }

        public function delete($id)
    {
        Department::where('id', $id)->forceDelete();
        return redirect()->route('departmenttrash');
    }
}
