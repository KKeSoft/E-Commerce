<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
            E-Shopper
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('dashboard*') ? 'active':''}}">
                <a class="nav-link" href="{{URL::to('/dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{Request::is('all_category*') ? 'active':''}} ">
                <a class="nav-link" href="{{URL::to('/all_category')}}">
                    <i class="material-icons">category</i>
                    <p>All Category</p>
                </a>
            </li>
            <li class="{{Request::is('add_category*') ? 'active': ''}}">
                <a class="nav-link" href="{{URL::to('/add_category')}}">
                    <i class="material-icons">add_circle</i>
                    <p>Add Category</p>
                </a>
            </li>
            <li class="{{Request::is('all_manufacture') ? 'active':''}}">
                <a class="nav-link" href="{{URL::to('/all_manufacture')}}">
                    <i class="material-icons">all_inclusive</i>
                    <p>All Manufacture</p>
                </a>
            </li>
            <li class="{{Request::is('add_manufacture')?'active':''}} ">
                <a class="nav-link" href="{{URL::to('/add_manufacture')}}">
                    <i class="material-icons">add_box</i>
                    <p>Add Manufacture</p>
                </a>
            </li>
            <li class="{{Request::is('add_product')?'active':''}}">
                <a class="nav-link" href="{{URL::to('/add_product')}}">
                    <i class="material-icons">add_shopping_cart</i>
                    <p>Add Product</p>
                </a>
            </li>
            <li class="{{Request::is('all_product')?'active':''}} ">
                <a class="nav-link" href="{{URL::to('/all_product')}}">
                    <i class="material-icons">wallpaper</i>
                    <p>All Product</p>
                </a>
            </li>
            <li class="{{Request::is('manage_order')?'active':''}}">
                <a class="nav-link" href="{{URL::to('/manage_order')}}">
                    <i class="material-icons">location_ons</i>
                    <p>Manage Order</p>
                </a>
            </li>

            <li class="{{Request::is('dashboard') ? 'active':''}} ">
                <a class="nav-link" href="/dashboard">
                    <i class="material-icons">notifications</i>
                    <p>Shop Name</p>
                </a>
            </li>
            <li class="{{Request::is('admin_dashboard') ? 'active':''}}">
                <a class="nav-link" href="/admin_dashboard">
                    <i class="material-icons">notifications</i>
                    <p>Delivery Man</p>
                </a>
            </li>
            <!-- <li class="nav-item active-pro ">
                  <a class="nav-link" href="./upgrade.html">
                      <i class="material-icons">unarchive</i>
                      <p>Upgrade to PRO</p>
                  </a>
              </li> -->
        </ul>
    </div>
</div>
    