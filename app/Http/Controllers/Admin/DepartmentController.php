<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\view\view;
use App\Http\Requests\DepartmentValidationRequest;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments=Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(DepartmentValidationRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('department.index');
    }

    public function show($id)
    {
        $departments=Department::findOrFail($id);
      	return view('admin.departments.show', compact('departments'));
    }

    public function edit($id)
    {
        $department=Department::findOrFail($id);
        return view('admin.departments.edit', compact('department'));
    }

    public function update( DepartmentValidationRequest $request,  $id)
    {
        $department=Department::findOrFail($id);
        $department->update($request->validated());

        return redirect()->route('department.index');
    }

    public function destroy( $id)
    {
        $department=Department::findOrFail($id);
        $department->delete();

        return redirect()->route('department.index');
    }
}
