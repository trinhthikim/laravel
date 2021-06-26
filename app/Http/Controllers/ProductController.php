<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return View::make('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('products.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = new Product;

        if($request->file()) {
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

            $product->name = $request->name;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->image = 'storage/' . $filePath;
            $product->save();

            return redirect()->route('product.index')
            ->with('success','File has been uploaded.')
            ->with('product', $product);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //$products = Product::find($product);

        // show the view and pass the shark to it
        return View::make('products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return View::make('products.edit')
            ->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if($request->file()) {
            $image_path = public_path().'/'.$product->image;
            unlink($image_path);
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

            
            $product->image = 'storage/' . $filePath;
            
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('product.index')
        ->with('success','File has been uploaded.')
        ->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $image_path = public_path().'/'.$product->image;
        unlink($image_path);
        $product->delete();
        
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
