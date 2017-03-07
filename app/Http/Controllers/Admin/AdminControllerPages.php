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
        return view('admin.views.pages.create_pages');
    }

    public function store(Request $request)
    {
        $input = Request::all();
        $input['published_at'] = Carbon::now();
        Pages::create($input);
        return redirect('admin/pages')->with('flash_message', 'Страница успешно создана!');
    }

    public function edit($id)
    {
        $pages = Pages::findOrFail($id);
        return view('admin.views.pages.edit_pages', compact('pages'));
    }

    public function update(Request $request, $id)
    {

        $pages = Pages::findOrFail($id);
        $pages->update(Request::all());;
        return redirect('admin/pages')->with('flash_message', 'Страница успешно отредактирована!');

    }

    public function destroy($id)
    {
        $pages = Pages::findOrFail($id);
        $pages->delete();
        return redirect('admin/pages')->with('flash_message', 'Страница успешно удалена!');

    }
}
