<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="mdi mdi-speedometer menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/orders')}}">
        <i class="mdi mdi-sale menu-icon"></i>
        <span class="menu-title">Orders</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#cat" aria-expanded="false" aria-controls="cat">
        <i class="mdi mdi-view-list menu-icon"></i>
        <span class="menu-title">Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="cat">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}"> View Categories </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/category/create')}}"> Add Category </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#prod" aria-expanded="false" aria-controls="prod">
        <i class="mdi mdi-plus-circle menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="prod">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}"> View Products </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create')}}"> Add Product </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/brands')}}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Brands</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/colors')}}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Colors</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-account-multiple-plus menu-icon"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/sliders')}}">
        <i class="mdi mdi-view-carousel menu-icon"></i>
        <span class="menu-title">Home Slider</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/settings')}}">
        <i class="mdi mdi-cogs menu-icon"></i>
        <span class="menu-title">Site Setting</span>
      </a>
    </li>
  </ul>
</nav>
