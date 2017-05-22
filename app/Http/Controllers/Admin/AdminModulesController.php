<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Modules;
use Request;

class AdminModulesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modules = Modules::all();
        return view('admin.views.modules.modules', compact('modules'));
    }


    public function edit($id)
    {
        $module = Modules::findOrFail($id);
        return view('admin.views.modules.edit_module', compact('module'));
    }

    public function update($id)
    {
        $module = Modules::findOrFail($id);
        $module->update(Request::all());
        return redirect('admin/modules')->with('flash_message', 'Модуль успешно отредактирован!');
    }

}
