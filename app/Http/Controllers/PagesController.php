<?php

namespace App\Http\Controllers;
use App\Pages;
use Carbon\Carbon;
use Request;


class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Pages::findOrFail(1);
        return view('index', compact('page'));
    }

    public function page($url)
    {
        $page = Pages::where('url', '=', $url)->firstOrFail();
        return view('index', compact('page'));
    }

}
