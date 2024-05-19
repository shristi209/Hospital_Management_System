<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;

class TrashDepartmentController extends Controller
{
    protected $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
        $this->middleware('Permission:department trash', ['only'=> ['restore', 'delete']]);

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
