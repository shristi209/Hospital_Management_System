<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\view\view;

class TrashDepartmentController extends Controller
{
    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function index(){
        $departments=$this->department->onlyTrashed()->get();
        return view('admin.departments.trash', compact('departments'));
    }

     public function restore($id)
    {
        $department=$this->department->where('id', $id);
        $department->restore();
        return redirect()->route('department.index');
    }

        public function delete($id)
    {
        $this->department->where('id', $id)->forceDelete();
        return redirect()->route('departmenttrash');
    }
}
