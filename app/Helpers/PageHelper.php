<?php
namespace App\Helpers;
use App\Models\Page;

use Illuminate\Support\Facades\DB;

class PageHelper
{
    protected $page;

    public function __construct(Page $page){
        $this->page = $page;
    }

    public function dropdown(){
        $pages = $this->page->orderBy('id', 'desc')
                            ->select(DB::raw('name, title->>"$.en" as title_en'))
                            ->pluck('title_en', 'name');
        return $pages;
    }
    
    public function fetchPages(){
        $pages=$this->page->get();
        return $pages;
    }
}

