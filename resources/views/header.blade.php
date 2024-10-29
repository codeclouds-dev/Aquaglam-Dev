@include('usercss')


<body>


    <!-- TopNav  -->
    <div class="top-nav">
        <p>Labor Day / End Of Summer Sale - All Items $10</p>
    </div>
    <!-- Navbar  -->
    <div class="logo-nav" id="logoNav">
        <img src="assets/images/logo.png" alt="logo" class="img-fluid main-logo">

        <div class="search-section">
            <ul>
                <li>
                    <div class="search-wrapper">
                        <input type="search" placeholder="Search" />
                        <button class="search-btn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </li>

                @if(Auth::guard('customer')->check())

                    <li>
                        <a href="{{ route('user.profile') }}"><i class="bi bi-person-circle"></i></a>
                    </li>
                    {{-- <p>Welcome, {{ Auth::guard('customer')->user()->firstname }}!</p> --}}
                    
                @else
                <li><i class="bi bi-person-circle" data-bs-toggle="modal" data-bs-target="#loginModal"></i></li>
                

                    @if($errors->any())
                        <div>
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    @endif
                @endif

                <li><i class="bi bi-bag"></i></li>
                
                
               
                {{-- <li><i class="bi bi-person-circle" data-bs-toggle="modal" data-bs-target="#loginModal"></i></li>
                <li><i class="bi bi-bag"></i></li> --}}
            </ul>
        </div>
    </div>
    <nav class="main-nav" id="main-nav">
        <div class="logo-fix" id="logo-fix">
            <img src="assets/images/logo.png" alt="logoFix" class="img-fluid logoFix">
        </div>
        <ul class="main-menu">

            <li><a href="#">Swimwear <i class="bi bi-chevron-down"></i></a>
                <div class="mega-menu" id="mega-menu">
                    <div class="d-flex">
                        <div class="girl-box">
                            <h3>Woman Swimwear</h3>
                            <img src="assets/images/girl.png" alt="">
                        </div>
                        <div class="child-box">
                            <h3>Child Swimwear</h3>
                            <img src="assets/images/child.png" alt="">
                        </div>
                        <div class="assesories-box">
                            <h3>Accessories</h3>
                            <img src="assets/images/asser.png" alt="">
                        </div>

                    </div>
                </div>
            </li>

            <li><a href="#">customer care</a></li>
        </ul>
        <div class="search-fix" id="searchFix">
            <ul>
                <li><i class="bi bi-search"></i></li>
                <li><i class="bi bi-person-circle"></i></li>
                <li><i class="bi bi-bag"></i></li>
            </ul>
        </div>
    </nav>