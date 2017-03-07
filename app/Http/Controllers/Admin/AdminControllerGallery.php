<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Gallery;
use Carbon\Carbon;


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
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

