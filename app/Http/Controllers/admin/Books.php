<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use Excel;
use Illuminate\Support\Facades\DB;

class Books extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')->join('authors', 'authors.id', 'books.author_id')
            ->join('publisher', 'publisher.id', 'books.publisher_id')
            ->join('categorys', 'categorys.id', 'books.category_id')
            ->select('books.id', 'categorys.name as cat_name', 'books.title', 'books.preview', 'books.status', 'authors.name as auth_name', 'publisher.name as pub_name', 'books.picture')
            ->paginate(config('setting.paginate-default'));

        return view('admin.book.index', compact('books'));
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
            Book::where('id', $id)->update(['status' => 0]);
        }
        else{
            Book::where('id', $id)->update(['status' => 1]);
        }

        return view('admin.book.ajaxUpdateStatus', compact('presentStatus', 'id'));
    }

    public function create()
    {
        $books_data = DB::table('books')->join('authors', 'authors.id', 'books.author_id')
            ->join('publisher', 'publisher.id', 'books.publisher_id')
            ->join('categorys', 'categorys.id', 'books.category_id')
            ->select('books.id', 'categorys.name as cat_name', 'books.title', 'books.preview', 'books.status', 'authors.name as auth_name', 'publisher.name as pub_name', 'books.picture')
            ->get();
        $book_array[] = array('ID', 'Category', 'Title', 'Preview', 'Author', 'Publisher', 'Picture', 'Status');
        foreach ($books_data as $book)
        {
            $id = $book->id;
            $category = $book->cat_name;
            $title = $book->title;
            $preview = $book->preview;
            $status = $book->status;
            $author = $book->auth_name;
            $publisher = $book->pub_name;
            $picture = $book->picture;
            $book_array[] = array(
                'ID' => $id,
                'Category' => $category,
                'Title' => $title,
                'Preview' => $preview,
                'Author' => $author,
                'Publisher' => $publisher,
                'Picture' => $picture,
                'Status' => $status,
            );
        }
        Excel::create('Book Data', function($excel) use ($book_array)
        {
            $excel->setTitle('Book Data');
            $excel->sheet('Book Data', function($sheet) use ($book_array)
            {
                $sheet->fromArray($book_array, null, config('setting.sheet-default'), false, false);
            });
        })->download('xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            $book = Book::findOrFail($id);
            $book->delete();

            return redirect(route('book.index'))->with('success', trans('errors.del-success'));
        } catch (Exception $exception) {

            return redirect(route('book.index'))->with('fail', trans('errors.del-fail'));
        }
    }
}
