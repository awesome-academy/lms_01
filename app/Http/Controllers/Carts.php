<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Cart;

class Carts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childs')->where('parent_id', config('setting.parent_id'))->get();
        $cats = Category::where('parent_id', '!=', config('setting.parent_id'))->get();

        return view('user.cart', compact('categories', 'cats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rowId1 = Cart::search(function ($cart, $key) use($request) {
            return $cart->id == $request->book_id;
        })->first()->rowId;
        Cart::remove($rowId1);

        return redirect()->back();
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
        $book = Book::find($id);
        $cartInfo = [
            'id' => $book->id,
            'name' => $book->title,
            'price' => config('setting.default'),
            'qty' => config('setting.quantity'),
            'options' => ['picture' => $book->picture],
        ];
        Cart::add($cartInfo);

        return redirect()->back();
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

    public function delItem(Request $request)
    {
        try {
            $rowId1 = Cart::search(function ($cart, $key) use ($request) {
                return $cart->id == $request->book_id;
            })->first()->rowId;
            Cart::remove($rowId1);

            return redirect()->back()->with('success', trans('errors.del-success'));
        } catch(Exception $exception){

            return redirect()->back()->with('fail', trans('errors.del-fail'));

        }
    }
}
