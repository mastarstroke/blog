<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin/dashboard')}}" class="nav-link {{ isActive('admin/dashboard') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('category/page')}}" class="nav-link {{ isActive('category/page') }}">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('add/category')}}" class="nav-link {{ isActive('add/category') }}">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Add Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin/post/page')}}" class="nav-link {{ isActive('admin/post/page') }}">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Post
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>