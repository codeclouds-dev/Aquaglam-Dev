<nav id="sidebar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="adminasset/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
    <div class="title">
      {{-- <h1 class="h5">{{ Auth::user()->name }}</h1> --}}
      {{-- <p>Web Designer</p> --}}
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
  <ul class="list-unstyled">
          <li class="active"><a href="{{ route('dashboard') }}"> <i class="icon-home"></i>Home </a></li>
          {{-- <li><a href="tables.html"> <i class="icon-grid"></i>New Book </a></li>
          <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Students </a></li>
          <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li> --}}
          <li><a href="{{ route('categories') }}"> <i class="icon-padnote"></i>Categories </a></li>
          <li><a href="{{ route('subcategories') }}"> <i class="icon-padnote"></i>Sub-Categories </a></li>
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="{{url('/view_product')}}">Add New</a></li>
              <li><a href="{{url('/product')}}">Product List</a></li>
              
            </ul>
          </li>
          <li><a href="{{url('/customers')}}"> <i class="icon-home"></i>Customers</a></li>
          <li><a href="{{url('/orders')}}"> <i class="icon-home"></i>Orders</a></li>
          <li><a href="{{url('/contacts')}}"> <i class="icon-home"></i>Contacts</a></li>
          
          {{-- <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="#">Page</a></li>
              <li><a href="#">Page</a></li>
              <li><a href="#">Page</a></li>
            </ul>
          </li> --}}
          {{-- <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li> --}}
  </ul>
  {{-- <span class="heading">Extras</span>
  <ul class="list-unstyled">
    <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
  </ul> --}}
</nav>