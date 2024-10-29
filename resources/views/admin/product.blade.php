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
            <h2 class="h5 no-margin-bottom">Products</h2>
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
                        {{-- <button type="button" class="btn btn-info btn-fw"><a href="">Add Category</a></button> --}}
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            
                            <thead>
                              <tr>
                                <th> # </th>
                                <th> SKU </th>
                                <th> Product Name </th>
                                <th> Category Name </th>
                                <th> Subcategory Name </th>
                                <th> Description </th>
                                <th> Price </th>
                                <th> Size </th>
                                <th> Color </th>
                                <th> Stock </th>
                                {{-- <th> Image </th> --}}
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($product as $data)
                              <tr>
                                <td> {{$data->id}} </td>
                                <td> {{$data->SKU}} </td>
                                <td> {{$data->name}} </td>
                                <td> {{$data->category->name}} </td>
                                <td> {{$data->subcategory->name}} </td>
                                <td> {{$data->desc}} </td>
                                <td> {{$data->price}} </td>
                                <td> {{$data->size}} </td>
                                <td> {{$data->color}} </td>
                                <td> {{$data->stock}} </td>
                                {{-- <td> 
                                  @foreach(json_decode($data->images) as $image)
                                  <img src="/products/{{$image->title}}" height="50" width="50">
                                  @endforeach 
                                </td> --}}
                                <td>
                                  <a href="{{url('editProduct',$data->id)}}" name="edit">Edit | </a>
                                  <a href="{{url('deleteProduct',$data->id)}}" name="delete">Delete</a>
                                </td>
                                
                                {{-- <td><img src="/product/{{$image->title}}"></td> --}}
                                
                                {{-- <td> {{$data->image}} </td> --}}
                                {{-- <td>
                                  <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td> $ 77.99 </td>
                                <td> May 15, 2015 </td> --}}
                              </tr>
                            @endforeach
                              
                            </tbody>
                          </table>
                          {{-- {{ $product->links() }} --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
        
        
        @include('admin.footer')

      
  </body>
</html>
