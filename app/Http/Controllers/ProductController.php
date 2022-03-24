<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = 5;
        if (request()->has('items_count')) {
            $counts = request()->items_count;
        }
        $products = product::orderBy('id', 'desc')->paginate($counts);

        return view('product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("product.addnew");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([

            'name' => 'required|min:3|max:20',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
            'description' => 'max:1000'
        ]);
        /* dd($request->all()); */
        $imgname = 'product_' . time() . rand() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $imgname);

        product::create([
            'productname' => $request->name,
            'price' => $request->price,
            'image' => $imgname,
            'description' => $request->description,

        ]);
        return redirect()->route('product.index')->with('msg', 'You Add A New product ')->with('type', 'success')->with('fa', 'fa-solid fa-check');
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
        product::destroy($id);
        return redirect()->route('product.index')->with('msg', 'Product Deleted ')->with('type', 'danger')->with('fa', 'fa-solid fa-trash-can-check');
    }
}
