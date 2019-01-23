<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('childs')->where('parent_id', config('setting.parent_id'))->get();
        $cats = Category::where('parent_id', '!=', config('setting.parent_id'))->get();
        $books = Book::orderBy('id', 'desc')->get();

        return view('user.index', compact('categories', 'books', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $categories = Category::with('childs')->where('parent_id', config('setting.parent_id'))->get();
        $cats = Category::where('parent_id', '!=', config('setting.parent_id'))->get();
        $getSearch = DB::table('books')->join('authors', 'authors.id', 'books.author_id')
            ->join('publisher', 'publisher.id', 'books.publisher_id')
            ->join('categorys', 'categorys.id', 'books.category_id')
            ->where('books.title', 'like', "%$keySearch%")
            ->orWhere('authors.name', 'like', "%$keySearch%")
            ->orWhere('publisher.name', 'like', "%$keySearch%")
            ->orWhere('categorys.name', 'like', "%$keySearch%")
            ->select('books.category_id', 'books.id', 'categorys.name as cat_name', 'books.title', 'books.preview', 'books.status', 'authors.name as auth_name', 'publisher.name as pub_name', 'books.picture')
            ->get();

        return view('user.search', compact('categories', 'getSearch', 'cats'));
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
        //
    }
}
