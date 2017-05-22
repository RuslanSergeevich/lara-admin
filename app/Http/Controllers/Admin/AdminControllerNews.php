<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\News;
use Carbon\Carbon;
use Request;
use Input;
use Image;

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
        $news = new News;
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
            $file->move(public_path().'/images/news/', $data['img']);
            $path = public_path().'/images/news/'.'thumb_'.$data['img'];
            $imagePath = public_path() . '/images/news/' . $data['img'];
            $img = Image::make($imagePath);
            $img->resize(null, 175, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path);
        }else{
            $data['img']='';
        }

        $news->create($data);

        return redirect('admin/news')->with('flash_message', 'Новость успешно создана!');
    }

    public function edit($id)
    {

        $news = News::findOrFail($id);
        return view('admin.views.news.edit_news', compact('news'));
    }

    public function update($id)
    {

        $data = Request::all();
        $news = News::findOrFail($id);

        $news->title = $data['title'];
        $news->description = $data['description'];
        if (!empty($data['keywords'])){
            $news->keywords = $data['keywords'];
        }else{
            $news->keywords = '';
        }
        $news->url = $data['url'];
        $news->name = $data['name'];
        $news->published = $data['published'];
        $news->updated_at = Carbon::now();


        if (!empty($data['text'])) {
            $news->text = $data['text'];
        }else{
            $news->text = '';
        }
        if (!empty($data['small_text'])) {
            $news->small_text = $data['small_text'];
        }else{
            $news->small_text = '';
        }

        $news->update();

        if (Input::hasFile('img')){
            $file = Input::file('img');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/news/', $name);
            $path = public_path().'/images/news/'.'thumb_'.$name;
            $imagePath = public_path() . '/images/news/' . $name;
            $news->img = $name;
            $img = Image::make($imagePath);
            $img->resize(null, 175, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path);
            $news->update();
        }

        return redirect('admin/news')->with('flash_message', 'Новость успешно отредактирована!');

    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('admin/news')->with('flash_message', 'Новость успешно удалена!');

    }
}
