<?php
namespace App\Helpers;
use App\Models\Role;

class RoleHelper
{
    protected $role;
    public function __construct(Role $role){
        $this->role=$role;
    }
    public function dropdown(){
        $role=$this->role->orderBy('id', 'desc')->pluck('name', 'name') ;
        return $role;
    }
}
