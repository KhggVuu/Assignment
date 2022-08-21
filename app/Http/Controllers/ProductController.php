<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producer;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $data= Product::select('products.*','producers.producerName')
        ->join('producers','products.producerID','=','producers.producerID')->get();
        return view('product/P-list',compact('data'));
    }

    public function index2()
    {
        $producers = Producer::get();
        $data = Product::get();
        return view('product/P-list', compact('data','producers'));
    }
    public function AddProduct()
    {
        $categories = Category::get();
        $producers = Producer::get();
        return view('product/A-product', compact('producers','categories'));
    }

    public function SaveProduct(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required',
            'image'=>'required',
        ]);


        //dd($request->all());
        $product = new Product();
        $product->productID = $request->id;
        $product->productName = $request->name;
        $product->productPrice = $request->price;
        $product->productDetails = $request->detail;
        $product->productImage1 = $request->image;
        $product->producerID = $request->producer;
        $product->categoryID = $request->category;
        $product->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $producers = Producer::get();
        $categories= Category::get();
        $data = Product::where('productID', '=', $id)->first();
        return view('product/E-product', compact('data','producers','categories'));
    }

    public function update(Request $request)
    {
        $productID = $request->id;
        $productName = $request->name;
        $productPrice = $request->price;
        $productDetails = $request->detail;
        $productImage1 = $request->image;
        $producerID = $request->producer;
        $categoryID = $request ->category;
        Product::where('productID', '=', $productID)->update([
            'productName'=>$productName,
            'productPrice'=>$productPrice,
            'productDetails'=>$productDetails,
            'productImage1'=>$productImage1,
            'producerID'=>$producerID,
            'categoryID'=>$categoryID

            // 'productName'=>$request->name,
            // 'productPrice'=>$request->price,
            // 'productDetails'=>$request->detail,
            // 'productImage1'=>$request->image,
            // 'producerID'=>$request->producer
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

        public function delete($id)
        {
            $data = Product::where('productID', '=', $id)->delete();
            return redirect()->back()->with('success', 'Product removed successfully!');
        }

}
