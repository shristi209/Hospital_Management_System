<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageValidationRequest;

class PageController extends Controller
{
    protected $page;
    public function __construct(Page $page)
    {
        $this->page=$page;
    }

    public function index()
    {
        $pages= $this->page->get();
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(PageValidationRequest $request)
    {
        $data=$request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/img/pages'), $fileName);
        } else {
            return back()->with('fail_message', 'Please upload a profile picture!!!');
        }
        $data['image'] = '/backend/img/pages' . '/' . $fileName;
        $data['slug'] = Str::slug($data['title']['en']);

        $data['title'] = [
            'en' => $data['title']['en'],
            'ne' => $data['title']['ne'],
        ];

        $data['content'] = [
            'en' => $data['content']['en'],
            'ne' => $data['content']['ne'],
        ];

        $this->page->create([
            'slug'=>$data['slug'],
            'title'=> $data['title'],
            'content' => $data['content'],
        ]);

        return redirect()->route('page.index');
    }


    public function show( $id)
    {

    }


    public function edit( $id)
    {
        $page=$this->page->findOrFail($id);
        return view('admin.page.edit', compact('page'));
    }


    public function update(PageValidationRequest $request,  $id)
    {
        $data=$request->validated();
        $page=$this->page->findOrFail($id);
        $page->update($data);

        return redirect()->route('page.index');
    }


    public function destroy($id)
    {
        $page=$this->page->findOrFail($id);
        $page->delete();
        return redirect()->route('page.index');
    }
}
