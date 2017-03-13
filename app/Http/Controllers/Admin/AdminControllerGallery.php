<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\GalleryImage;
use Carbon\Carbon;
use Request;
use Image;
use Input;

class AdminControllerGallery extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.views.gallery.gallery', compact('gallery'));
    }

    public function create()
    {
        return view('admin.views.gallery.create_gallery');
    }

    public function store()
    {
        $input = Request::all();
        $input['published_at'] = Carbon::now();
        Gallery::create($input);
        return redirect('admin/gallery')->with('flash_message', 'Галерея успешно создана! можно загрузить в нее изображения!');
    }

    public function edit($id)
    {
        $gallery_image = GalleryImage::where('parent_id', $id)->get();
        $gallery = Gallery::findOrFail($id);
        return view('admin.views.gallery.edit_gallery', compact('gallery', 'gallery_image'));
    }

    public function update($id)
    {

        $gallery = Gallery::findOrFail($id);
        $gallery->update(Request::all());
        return redirect('admin/gallery')->with('flash_message', 'Галерея успешно отредактирована!');
    }


    public function destroy($id)
    {

    }


    public function edit_image()
    {
        $data = Request::all();
        $image_edit = GalleryImage::findOrFail($data['img_id']);
        if (!empty($data['title'])){
            $image_edit->title = $data['title'];
        }else{
            $image_edit->title = '';
        }
        if (!empty($data['alt'])){
            $image_edit->alt = $data['alt'];
        }else{
            $image_edit->alt = '';
        }
        if (isset($data['published'])){
            $image_edit->published = $data['published'];
        }else{
            $image_edit->published = 0;
        }

        $image_edit->update();

        return ('Успех! Данные сохранены!');
    }

    public function addphoto($id)
    {

        if (Input::hasFile('file')){

            $gallery_image = new GalleryImage;
            $data['published_at'] = Carbon::now();

            $data = Request::all();
            $file = Input::file('file');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/gallery/', $name);
            $path = public_path().'/images/gallery/'.'thumb_'.$name;
            $imagePath = public_path() . '/images/gallery/' . $name;
            $img = Image::make($imagePath);

            $img->resize(null, 175, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($path);
            $data['parent_id'] = $id;
            $data['img'] = $name;
            $data['title'] = '';
            $data['alt'] = '';
            $data['published'] = '1';

            $gallery_image->create($data);

        }
    }

}

