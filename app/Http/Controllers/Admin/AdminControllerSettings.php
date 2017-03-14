<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Settings;
use App\News;
use Illuminate\Http\Request;

class AdminControllerSettings extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = 1;
        $settings = News::findOrFail($id);
        return view('admin.views.settings.settings ', compact('settings'));

        /*$settings = Settings::findOrFail('1');

        return view('admin.views.settings.settings ', compact('settings'));*/
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
            $settings->alt = $data['phone2'];
        }else{
            $settings->alt = '';
        }
        if (isset($data['phone3'])){
            $settings->phone3 = $data['phone3'];
        }else{
            $settings->phone3 = '';
        }

        $settings->update();

        return ('Успех! Данные сохранены!');
    }
}
