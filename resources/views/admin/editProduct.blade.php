{{-- @extends('admin.adminheader') --}}
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.admincss')
  </head>
  <body>
    
    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

        @include('admin.sidebar')


      <!-- Sidebar Navigation end-->

<div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Update Product Details</h2>
        @if(session()->has('status'))
          <div class="alert alert-success mt-3" id="successMessage">
            {{ session('status') }}
          </div>
        @endif
      </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  {{-- <h4 class="card-title">Default form</h4>
                  <p class="card-description"> Basic form layout </p> --}}
                  <form class="forms-sample" name="update_product" action="{{ url('/updateProduct',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" value="{{$product->SKU}}" name="sku" placeholder="Product SKU" readonly>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select for="category" class="form-control" id="" name="category" required>

                            <option value="{{$product->cat_id}}" selected="">{{$product->category->name}}</option>

                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub Category</label>
                        <select for="subcategory" class="form-control" id="" name="subcategory" required>

                        <option value="{{$product->sub_cat_id}}" selected="">{{$product->subcategory->name}}</option>

                            @foreach($subcategory as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" value="{{$product->name}}" name="prod_name" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" value="{{$product->desc}}" name="desc" placeholder="Product Description" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" value="{{$product->price}}" name="price" placeholder="Product Price" required>
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" class="form-control" value="{{$product->size}}" name="size" placeholder="Product Size">
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" value="{{$product->color}}" name="color" placeholder="Product Color">
                    </div>
                    <div class="form-group">
                        {{-- <label for="image">Recent Image</label>
                        <img src="/products/{{$product->image->title}}" height="100" width="100"> --}}

                        <label for="image">New Image</label>
                        <input type="file" class="form-control" id="" name="image">
                    </div>
                    <div class="form-group">
                        <label for="stock">Quantity</label>
                        <input type="number" class="form-control" min="0" name="stock" value="{{$product->stock}}" placeholder="Stock of Product" required>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
               
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
 
            
    @include('admin.footer')

      
</body>
</html>
