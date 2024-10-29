<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\Product;
use App\Models\Images;

class ProductController extends Controller
{
    public $category;
    public $subcategories=[];
    public $subcategory;
    
    public function view_product()
    {

        $category = Category::all();
        $subcategory = Sub_Category::all();
        return view('admin.add_product',compact('category','subcategory'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;
        
        $product->cat_id = $request->category;
        $product->sub_cat_id = $request->subcategory;
        $product->SKU = $request->sku;
        $product->name = $request->prod_name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->stock = $request->stock;
        // $product->cat_id = $request->category;
        $product->save();
        if ($request->hasFile('image')) {

          foreach($request->file('image') as $img)
          {
            $imagename = time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('/products'),$imagename);
            $data[] = $imagename;
          }
        }

        

        $image = new Images;
        $image->pro_id = $product->id;
        $image->title = json_encode($data);
        $image->save();
        
        // $image = new Images;
        // $image->pro_id = $product->id;
        // $imagename = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('/products'),$imagename);
        // $image->title = $imagename;
        // $image->save();

        return redirect()->back()->with('status', 'Product added successfully');
        
    }

    public function show_product()
    {
        $product = Product::with('images')->get();
        // dd($product);
        return view('admin.product',compact('product'));
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $subcategory = Sub_Category::all();

        return view('admin.editProduct', compact('product','category','subcategory'));

    }

    public function update_product(Request $request,$id)
    {
      
      $product = Product::find($id);
      
      $product->cat_id = $request->category;
      $product->sub_cat_id = $request->subcategory;
      $product->SKU = $request->sku;
      $product->name = $request->prod_name;
      $product->desc = $request->desc;
      $product->price = $request->price;
      $product->size = $request->size;
      $product->color = $request->color;
      $product->stock = $request->stock;
        
      $product->save();
        //dd($product);
      // $image = Images::all();

      $image = $request->file('image');
      $myimage = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('/products'), $myimage);
      // dd($image);
      $product->images->update(['title'=>$myimage]);
      
      

    //   $image = Images::all();
    //   $image->pro_id = $product->id;
    //   $imagename = time().'.'.$request->image->getClientOriginalExtension();
    //   $request->image->move(public_path('/products'),$imagename);
    //   $image->title = $imagename;
    //   $image->save();
  
      
      return redirect('product')->with('status', 'Product Updated!');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);  

        $product->delete();

        // if($product->delete()) { // If softdeleted

          
        //   $product->update(['cat_id' => null,'sub_cat_id' => null]);
          
            
        // }
        return redirect()->back()->with('status', 'Product deleted successfully');
    }
}
