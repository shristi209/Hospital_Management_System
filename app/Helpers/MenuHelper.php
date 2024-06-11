<?php
namespace App\Helpers;

use App\Models\Menu;

class MenuHelper
{
    protected $menu;
    public function __construct(Menu $menu){
        $this->menu=$menu;
    }
    public function fetchMenus()
    {
        $menus=$this->menu->where('status', 1)
        ->orderBy('display_order')
        ->get();
        return $menus;
    }
}
