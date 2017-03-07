<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use App\Pages;
use App\Articles;

use Illuminate\Http\Request;

class AdminControllerMenu extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pages = Pages::all();
        $articles = Articles::all();
        $news = News::all();

        return view('admin.views.menu.menu', compact('news', 'pages', 'articles'));


    }

    /*public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.views.news.edit_news', compact('news'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
