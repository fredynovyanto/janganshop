<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="{{route('dashboard')}}" class="simple-text logo-normal">
      {{ config('app.name', 'Laravel') }}
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{request()->is('dashboards') ? 'active' : ''}}  ">
          <a class="nav-link" href="{{route('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{request()->is('dashboards/categories*') ? 'active' : ''}}  ">
          <a class="nav-link" href="{{route('categories.index')}}">
            <i class="material-icons">category</i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item {{request()->is('dashboards/products*') ? 'active' : ''}}  ">
          <a class="nav-link" href="{{route('products.index')}}">
            <i class="material-icons">inventory</i>
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item {{request()->is('dashboards/orders*') ? 'active' : ''}}  ">
          <a class="nav-link" href="{{route('orders.index')}}">
            <i class="material-icons">shopping_cart_checkout</i>
            <p>Orders</p>
          </a>
        </li>
        <li class="nav-item {{request()->is('dashboards/users*') ? 'active' : ''}}"">
          <a class="nav-link" href="{{route('users.index')}}">
            <i class="material-icons">people_alt</i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('landing')}}">
            <i class="material-icons">home</i>
            <p>Home</p>
          </a>
        </li>
      </ul>
    </div>
  </div>