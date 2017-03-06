<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Articles;
use Carbon\Carbon;
use Request;
use Flash;

class AdminControllerArticles extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Articles::all();
        return view('admin.views.articles.articles', compact('articles'));
    }

    public function create()
    {
        return view('admin.views.articles.create_article');
    }

    public function store()
    {
        $input = Request::all();
        $input['img'] = '';
        $input['published_at'] = Carbon::now();
        Articles::create($input);
        return redirect('admin/articles')->with('flash_message', 'Статья успешно создана!');
    }

    public function edit($id)
    {

        $article = Articles::findOrFail($id);
        return view('admin.views.articles.edit_article', compact('article'));
    }

    public function update(Request $request, $id)
    {

        $article = Articles::findOrFail($id);
        $article->update(Request::all());;
        return redirect('admin/articles')->with('flash_message', 'Статья успешно отредактирована!');

    }

    public function destroy($id)
    {
        $article = Articles::findOrFail($id);
        $article->delete();
        return redirect('admin/articles')->with('flash_message', 'Статья успешно удалена!');

    }
}
