<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Comments;
use Carbon\Carbon;
use Request;

class AdminControllerComments extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $comments= Comments::all();
        return view('admin.views.comments.comments', compact('comments'));
    }

    public function create()
    {
        return view('admin.views.comments.create_comments');
    }

    public function store()
    {
        $input = Request::all();
        $input['published_at'] = Carbon::now();
        Comments::create($input);
        return redirect('admin/comments')->with('flash_message', 'Отзыв успешно создана!');
    }

    public function edit($id)
    {
        $comments = Comments::findOrFail($id);
        return view('admin.views.comments.edit_comments', compact('comments'));
    }

    public function update(Request $request, $id)
    {
        $comments = Comments::findOrFail($id);
        $comments->update(Request::all());;
        return redirect('admin/comments')->with('flash_message', 'Отзыв успешно отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comments::findOrFail($id);
        $comments->delete();
        return redirect('admin/comments')->with('flash_message', 'Отзыв успешно удален!');
    }
}
