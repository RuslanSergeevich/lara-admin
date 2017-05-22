<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Articles;
use Carbon\Carbon;
use Request;
use Input;
use Image;


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

        $article = new Articles;
        $data = Request::all();
        if (empty($data['keywords'])) {
            $data['keywords'] = '';
        }
        if (empty($data['text'])) {
            $data['text'] = '';
        }
        if (empty($data['small_text'])) {
            $data['small_text'] = '';
        }
        $data['published_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        if (Input::hasFile('img')){
            $file = Input::file('img');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $data['img'] = $timestamp. '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/articles/', $data['img']);
            $path = public_path().'/images/articles/'.'thumb_'.$data['img'];
            $imagePath = public_path() . '/images/articles/' . $data['img'];
            $img = Image::make($imagePath);
            $img->resize(null, 175, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path);
            $data['img'] = $timestamp. '-' .$file->getClientOriginalName();
        }else{
            $data['img']='';
        }

        $article->create($data);
        return redirect('admin/articles')->with('flash_message', 'Статья успешно создана!');
    }

    public function edit($id)
    {

        $article = Articles::findOrFail($id);
        return view('admin.views.articles.edit_article', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $data = Request::all();
        $article = Articles::findOrFail($id);

        $article->title = $data['title'];
        $article->description = $data['description'];
        if (!empty($data['keywords'])){
            $article->keywords = $data['keywords'];
        }else{
            $article->keywords = '';
        }
        $article->url = $data['url'];
        $article->name = $data['name'];
        $article->published = $data['published'];
        $article->updated_at = Carbon::now();


        if (!empty($data['text'])) {
            $article->text = $data['text'];
        }else{
            $article->text = '';
        }
        if (!empty($data['small_text'])) {
            $article->small_text = $data['small_text'];
        }else{
            $article->small_text = '';
        }

        $article->update();

        if (Input::hasFile('img')){
            $file = Input::file('img');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/articles/', $name);
            $path = public_path().'/images/articles/'.'thumb_'.$name;
            $imagePath = public_path() . '/images/articles/' . $name;
            $article->img = $name;
            $img = Image::make($imagePath);
            $img->resize(null, 175, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path);
            $article->update();
        }

        return redirect('admin/articles')->with('flash_message', 'Статья успешно отредактирована!');

    }

    public function destroy($id)
    {
        $article = Articles::findOrFail($id);
        $article->delete();
        return redirect('admin/articles')->with('flash_message', 'Статья успешно удалена!');

    }
}
