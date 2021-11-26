<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container">
        <a class="navbar-brand" href="{{route('landing')}}">JanganShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            {{-- <ul class="navbar-nav ml-auto">
                @if (request()->is('/'))    
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#categories">Categories</a>
                </li>
                @endif
            </ul> --}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('wishlist.index')}}"><i class="fa fa-heart fa-lg mx-1"></i>
                        <small class="badge badge-pill badge-warning notification-badge wishlist-count" style="position: relative; top: -10px; right: 10px; margin-right: -18px;">
                            0
                        </small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}"><i class="fa fa-shopping-cart fa-lg mx-1"></i>
                        <small class="badge badge-pill badge-warning notification-badge cart-count" style="position: relative; top: -10px; right: 10px; margin-right: -18px;">
                            0
                        </small>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user fa-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        @auth
                        <a class="dropdown-item" href="{{route('my-orders')}}">My Order</a>
                        <a class="dropdown-item" href="{{route('users.show', Auth::id())}}">Profile</a>
                        <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                        <div class="dropdown-divider"></div> 
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <button class="nav-link btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-search fa-lg"></i>
                    </button>
                    <div class="dropdown-menu shadow-sm dropdown-menu-right p-2" aria-labelledby="dropdownMenuButton" style="width: 17.5rem;">
                        <form class="form-inline my-2 my-lg-0" action="{{route('search')}}">
                            <input class="form-control mr-sm-2" name="keyword" value="{{Request::get('keyword')}}" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>