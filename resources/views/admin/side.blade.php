 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh Mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="fas fa-circle"></i>

              <p>
                Quản lý cửa hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('store.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm cửa hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('store.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách của hàng</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="fas fa-long-arrow-alt-right"></i>
              <p>
                Chi tiết cửa hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('store_detail.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm cửa hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('store_detail.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách của hàng</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Sản Phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Sản Phẩm</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="fas fa-long-arrow-alt-right"></i>
              <p>
                Chi Tiết Sản Phẩm 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product_detail.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product_detail.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="fas fa-long-arrow-alt-right"></i>
              <p>
                Quản lý ảnh sản shẩm 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product_image.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product_image.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
             
            </ul>
          </li>


          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-images"></i>

              <p>
                Slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('slider.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Slider</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Giỏ Hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Đơn Hàng</p>
                </a>
              </li>
             
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>