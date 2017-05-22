<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Pages;
use Carbon\Carbon;
use Request;

class AdminControllerPages extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pages = Pages::all();
        return view('admin.views.pages.pages', compact('pages'));
    }

    public function create()
    {
        $pages_list = Pages::all()->pluck('name', 'id')->toArray();
        return view('admin.views.pages.create_page', compact('pages_list'));
    }

    public function store(Request $request)
    {
        $data = Request::all();
        if (empty($data['parent_id'])) {
            $data['parent_id'] = '';
        }
        if (empty($data['keywords'])) {
            $data['keywords'] = '';
        }
        if (empty($data['text'])) {
            $data['text'] = '';
        }
        $data['published_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        Pages::create($data);
        return redirect('admin/pages')->with('flash_message', 'Страница успешно создана!');
    }

    public function edit($id)
    {
        $pages_list = Pages::all()->pluck('name', 'id')->toArray();
        $pages_list_selected = Pages::all()->pluck('name', 'id')->where('parent_id', $id)->toArray();
        $page = Pages::findOrFail($id);
        return view('admin.views.pages.edit_page', compact('page', 'pages_list', 'pages_list_selected'));
    }

    public function update(Request $request, $id)
    {
        $data = Request::all();
        $pages = Pages::findOrFail($id);
        $pages->title = $data['title'];
        $pages->parent_id = $data['parent_id'];
        $pages->description = $data['description'];
        if (!empty($data['keywords'])){
            $pages->keywords = $data['keywords'];
        }else{
            $pages->keywords = '';
        }
        if (!empty($data['text'])){
            $pages->text = $data['text'];
        }else{
            $pages->text = '';
        }
        $pages->url = $data['url'];
        $pages->name = $data['name'];
        $pages->published = $data['published'];
        $pages->top_menu = $data['top_menu'];
        $pages->footer_menu = $data['footer_menu'];
        $pages->updated_at = Carbon::now();

        $pages->update();
        return redirect('admin/pages')->with('flash_message', 'Страница успешно отредактирована!');

    }

    public function destroy($id)
    {
        $pages = Pages::findOrFail($id);
        $pages->delete();
        return redirect('admin/pages')->with('flash_message', 'Страница успешно удалена!');

    }
}
