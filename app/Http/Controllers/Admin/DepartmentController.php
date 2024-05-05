<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\view\view;
use App\Http\Requests\DepartmentValidationRequest;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function index()
    {
        $departments=$this->department->all();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(DepartmentValidationRequest $request)
    {
        $this->department->create($request->validated());
        return redirect()->route('department.index');
    }

    public function show($id)
    {
        $departments=$this->department->findOrFail($id);
      	return view('admin.departments.show', compact('departments'));
    }

    public function edit($id)
    {
        $department=$this->department->findOrFail($id);
        return view('admin.departments.edit', compact('department'));
    }

    public function update( DepartmentValidationRequest $request,  $id)
    {
        $department=$this->department->findOrFail($id);
        $department->update($request->validated());

        return redirect()->route('department.index');
    }

    public function destroy( $id)
    {
        $department=$this->department->findOrFail($id);
        $department->delete();

        return redirect()->route('department.index');
    }
}
