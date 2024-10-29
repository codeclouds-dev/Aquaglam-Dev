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
        <h2 class="h5 no-margin-bottom">Update Sub Category</h2>
      </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <form class="forms-sample" name="add_subcategory" action="{{url('updateSubCategory',$subcategory->id)}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <div class="dropdown">
                            <label for="category">Choose Category</label>
                            <select class="btn btn-secondary dropdown-toggle" type="button" name="category_id" >
                            {{-- <select class="dropdown-menu" aria-labelledby="dropdownMenuButton2" name="cat_id" wire:model="Category"> --}}
                                <option value="{{$subcategory->cat_id}}" selected="">{{$subcategory->category->name}}</option>

                                  @foreach($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                  @endforeach
                                
                            </select>
                        {{-- </button> --}}
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="subCategory">Sub Category Name</label>
                      <input type="text" class="form-control" id="" name="subcat_name" value="{{$subcategory->name}}" placeholder="Sub Category">
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
