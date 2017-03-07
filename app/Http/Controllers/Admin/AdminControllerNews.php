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
        $data['published_at'] = Carbon::now();

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
            $data['img'] = $timestamp. '-' .$file->getClientOriginalName();
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

        $news = News::findOrFail($id);
        $news->update(Request::all());

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
