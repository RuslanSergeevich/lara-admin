<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Settings;
use Request;
use Image;
use Input;

class AdminControllerSettings extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = 1;
        $settings = Settings::findOrFail($id);
        //return  $settings->id;
        return view('admin.views.settings.settings ', compact('settings'));
    }

    public function save_settings()
    {
        $data = Request::all();
        $settings = Settings::findOrFail($data['id']);

        if (!empty($data['phone1'])){
            $settings->phone1 = $data['phone1'];
        }else{
            $settings->phone1 = '';
        }
        if (!empty($data['phone2'])){
            $settings->phone2 = $data['phone2'];
        }else{
            $settings->phone2 = '';
        }
        if (isset($data['phone3'])){
            $settings->phone3 = $data['phone3'];
        }else{
            $settings->phone3 = '';
        }
        if (isset($data['email'])){
            $settings->email = $data['email'];
        }else{
            $settings->email = '';
        }
        if (isset($data['email2'])){
            $settings->email2 = $data['email2'];
        }else{
            $settings->email2 = '';
        }
        if (isset($data['copyright'])){
            $settings->copyright = $data['copyright'];
        }else{
            $settings->copyright = '';
        }
        if (isset($data['address'])){
            $settings->address = $data['address'];
        }else{
            $settings->address = '';
        }
        if (isset($data['metrika'])){
            $settings->metrika = $data['metrika'];
        }else{
            $settings->metrika = '';
        }
        $settings->update();

        return ('Успех! Данные сохранены!');
    }
}
