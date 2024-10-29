<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_Category;

class SubcategoryController extends Controller
{
    public $categories;

    public function index()
    {
        // return view('admin.add_subcategory');
        $categories = Category::all();
        return view('admin.add_subcategory',compact('categories'));
        // var_dump($categories);
        // return view("admin.add_subcategory",['categories'=>$categories]);
    }

    public function addSubCategories(Request $request)
    {
        // echo $request->category_id;
        $subcategories = new Sub_Category;
        $subcategories->cat_id = $request->category_id;
        $subcategories->name = $request->subcat_name;
        $subcategories->save();
        return redirect('subcategories')->with('status', 'SubCategory Created!');
    }

    public function showCategories(){
        // return view('admin.subcategories');

        $subcategories=Sub_Category::paginate(10);
        // $categories = Category::find(1);
        
        return view('admin.subcategories',compact('subcategories'));
        // return view("admin.subcategories",['subcategories'=>$subcategories]);
    }

    public function edit_subcategory($id)
    {
        $subcategory = Sub_Category::find($id); 
        $category = Category::all();

        return view('admin.editSubCategories',compact('subcategory','category'));
    }

    public function update_category(Request $request,$id)
    {
      
      $subcategory = Sub_Category::find($id);
      $subcategory->cat_id = $request->category_id;
      $subcategory->name = $request->subcat_name;
      $subcategory->save();

      return redirect('subcategories')->with('status', 'Sub Category Updated!');
    }

    public function delete_subcategory($id)
    {
      $subcategory = Sub_Category::find($id);
      $subcategory->delete();
      return redirect('subcategories')->with('status', 'Sub-Category Deleted!');
    }

}
