<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Comments extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = DB::table('comments')->join('users', 'users.id', 'comments.user_id')
            ->join('books', 'books.id', 'comments.book_id')
            ->select('comments.id', 'users.name', 'books.title', 'comments.status', 'comments.created_at', 'comments.content')->paginate(config('setting.paginate-default'));

        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $presentStatus = $request->presentStatus;
        if($presentStatus == 1){
            Comment::where('id', $id)->update(['status' => 0]);
        }
        else{
            Comment::where('id', $id)->update(['status' => 1]);
        }
        return view('admin.comment.ajaxUpdateStatus', compact('presentStatus', 'id'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keySearch = $request->search;
        $getSearch = DB::table('comments')->join('users', 'users.id', 'comments.user_id')
            ->join('books', 'books.id', 'comments.book_id')
            ->select('comments.id', 'users.name', 'books.title', 'comments.status', 'comments.created_at', 'comments.content')
            ->where('users.name', 'like', "%$keySearch%")
            ->paginate(config('setting.paginate-default'));

        return view(('admin.comment.search'), compact('getSearch'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();

            return redirect(route('comment.index'))->with('success', trans('errors.del-success'));
        } catch (Exception $exception) {

            return redirect(route('comment.index'))->with('fail', trans('errors.del-fail'));
        }
    }
}
