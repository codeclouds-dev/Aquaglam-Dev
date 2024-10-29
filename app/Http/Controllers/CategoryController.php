<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_Category;

class CategoryController extends Controller
{
    public function showCategories(){
        // return view('admin.categories');

        $categories=Category::paginate(10);
        return view("admin.categories",['categories'=>$categories]);
    }

    public function index()
    {
        return view('admin.add_category');
    }

    public function addCategories(Request $request)
    {
      // return view('admin.add_category');

      $categories = new Category;
      $categories->name = $request->cat_name;
      $categories->save();
      return redirect('categories')->with('status', 'Category Created!');
    }

    public function edit_category($id)
    {
        // $category = Category::all();
        $category = Category::find($id);  
        return view('admin.editCategory',compact('category'));
    }

    public function update_category(Request $request,$id)
    {
      // return view('admin.add_category');
      $category = Category::find($id);
    //   $categories = new Category;
      $category->name = $request->cat_name;
      $category->save();
      return redirect('categories')->with('status', 'Category Updated!');
    }

    public function delete_category($id)
    {
      $category = Category::find($id);
      $category->subcategories()->delete();
      $category->delete();
      return redirect('categories')->with('status', 'Category Deleted!');
    }
    
    
}
