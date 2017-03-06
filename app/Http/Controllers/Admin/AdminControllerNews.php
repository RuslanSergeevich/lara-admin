<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\News;
use Carbon\Carbon;
use Request;

class AdminControllerNews extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $news = News::all();
        return view('admin.views.news.news', compact('news'));
    }

    public function create()
    {
        return view('admin.views.news.create_news');
    }

    public function store()
    {
        $input = Request::all();
        $input['img'] = '';
        $input['published_at'] = Carbon::now();
        News::create($input);
        return redirect('admin/news')->with('flash_message', 'Новость успешно создана!');
    }

    public function edit($id)
    {

        $news = News::findOrFail($id);
        return view('admin.views.news.edit_news', compact('news'));
    }

    public function update(Request $request, $id)
    {

        $news = News::findOrFail($id);
        $news->update(Request::all());;
        return redirect('admin/news')->with('flash_message', 'Новость успешно отредактирована!');

    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('admin/news')->with('flash_message', 'Новость успешно удалена!');

    }
}
