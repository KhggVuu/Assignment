<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return view('admin.category.index',compact('data'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
        ]);

        $category = new Category();
        $category->categoryID = $request->id;
        $category->categoryName = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function deleteC($id)
    {
        $data = Category::where('categoryID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Category removed successfully!');
    }
    public function editC($id)
    {
        $categories= Category::get();
        $data = Category::where('categoryID', '=', $id)->first();
        return view('admin/category/editC', compact('data','categories'));
    }

    public function updateC(Request $request)
    {

        $categoryID = $request->id;
        $categoryName = $request->name;
        Category::where('categoryID', '=', $categoryID)->update([
            'categoryName'=>$categoryName,
        ]);
        return redirect()->back()->with('success', 'Category update successfully!');
    }
}
