<?php
namespace App\Helpers;
use App\Models\Department;

class DepartmentHelper
{
    protected $department;
    public function __construct(Department $department)
    {
        $this->department=$department;
    }
    public function dropdown()
    {
        $department=$this->department->orderBy('id', 'desc') -> pluck('department_name', 'id');
        return $department;
    }
}
