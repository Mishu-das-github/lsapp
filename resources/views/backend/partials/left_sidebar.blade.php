<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{asset('images/faces/face1.jpg')}}" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">Richard V.Welsh</p>
                        <div>
                            <small class="designation text-muted">Manager</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">New Project
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{--
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
  <i class="menu-icon mdi mdi-content-copy"></i>
  <span class="menu-title">Basic UI Elements</span>
  <i class="menu-arrow"></i>
</a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product-pages" aria-expanded="false"
                aria-controls="product-pages">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.products')}}"> Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.product.create')}}"> Create Product</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false"
                aria-controls="category-pages">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.categories')}}"> Manage Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.category.create')}}"> Create Category</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order-pages" aria-expanded="false"
                aria-controls="order-pages">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="order-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.orders')}}"> Manage Orders</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false"
                aria-controls="brand-pages">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Brands</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="brand-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.brands')}}"> Manage Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.brand.create')}}"> Create Brand</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false"
                aria-controls="division-pages">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Divisions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="division-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.divisions')}}"> Manage Divisions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.division.create')}}"> Create Division</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false"
                aria-controls="district-pages">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Districts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="district-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.districts')}}"> Manage Districts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.district.create')}}"> Create District</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#slider-pages" aria-expanded="false"
                aria-controls="slider-pages">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Sliders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="slider-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sliders')}}"> Manage Sliders</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <form class="form-inline" action={{route('admin.logout')}} method="post">
                    @csrf
                    <input type="submit" value="Logout Now" class="btn btn-danger">
                </form>
            </a>
        </li>
    </ul>
</nav>