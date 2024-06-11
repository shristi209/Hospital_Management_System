<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Modal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuValidationRequest;

class MenuController extends Controller
{
    protected $page,$modals,$menu;
    public function __construct(Page $page, Modal $modals, Menu $menu)
    {
        $this->page=$page;
        $this->modals=$modals;
        $this->menu=$menu;
    }
    public function index()
    {
        $menus=$this->menu->all();
        return view('admin.menu.index', compact('menus'));
    }


    public function create()
    {
        $pages=$this->page->get();
        $titles=$pages->pluck('title.en', 'id')->toArray();
        $modals=$this->modals->pluck('name','id')->toArray();
        $menus= $this->menu->get();
        // dd($menus);
        $perentname=$menus->pluck('menu.en', 'id')->toArray();
        return view('admin.menu.create', compact('titles', 'modals', 'perentname'));
    }


    public function store(MenuValidationRequest $request)
    {
        $data=$request->validated();

       $this->menu->create($data);

       return redirect()->route('menu.index')->with('message', 'Successfully Created Menu!!!');
    }

    public function show( $id)
    {
        //
    }

    public function edit( $id)
    {
        $menu=$this->menu->findOrFail($id);

        return view('admin.menu.edit',compact('menu'));
    }

    public function update(Request $request,  $id)
    {
        //
    }

    public function destroy( $id)
    {
        //
    }
    public function sendMenu()
    {


    }
}
