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
        <h2 class="h5 no-margin-bottom">Add Products</h2>
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
                  <form class="forms-sample" name="" action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" id="" name="sku" placeholder="Product SKU">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select for="category" class="form-control" id="" name="category" required>

                            <option>Select Category</option>
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub Category</label>
                        <select for="subcategory" class="form-control" id="" name="subcategory" required>

                            <option>Select Sub Category</option>
                            @foreach($subcategory as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="" name="prod_name" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="" name="desc" placeholder="Product Description" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" inputmode="numeric" class="form-control" id="" name="price" placeholder="Product Price" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\..*/g, '$1');">
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" class="form-control" id="" name="size" placeholder="Product Size">
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="" name="color" placeholder="Product Color">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="" name="image[]" multiple>
                    </div>
                    <div class="form-group">
                        <label for="stock">Quantity</label>
                        <input type="number" class="form-control" min="0" name="stock" placeholder="Stock of Product" required>
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
