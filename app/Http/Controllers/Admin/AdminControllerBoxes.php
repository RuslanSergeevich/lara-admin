<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Boxes;
use Carbon\Carbon;
use Request;

class AdminControllerBoxes extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $boxes = Boxes::all();
        return view('admin.views.boxes.boxes', compact('boxes'));
    }

    public function create()
    {
        return view('admin.views.boxes.create_box');
    }

    public function store()
    {
        $input = Request::all();
        $input['img'] = '';
        $input['published_at'] = Carbon::now();
        Boxes::create($input);
        return redirect('admin/boxes')->with('flash_message', 'Блок успешно создан!');
    }

    public function edit($id)
    {

        $boxes= Boxes::findOrFail($id);
        return view('admin.views.boxes.edit_box', compact('boxes'));
    }

    public function update(Request $request, $id)
    {

        $boxes = Boxes::findOrFail($id);
        $boxes->update(Request::all());;
        return redirect('admin/boxes')->with('flash_message', 'Блок успешно отредактирован!');

    }

    public function destroy($id)
    {
        $boxes = Boxes::findOrFail($id);
        $boxes->delete();
        return redirect('admin/boxes')->with('flash_message', 'Блок успешно удален!');

    }
}
