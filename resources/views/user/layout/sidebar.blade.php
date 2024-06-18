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
            <a href="{{route('dashboard')}}" class="nav-link {{ isActive('user/dashboard') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('add/post')}}" class="nav-link {{ isActive('add/post') }}">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Add Post
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('view/post')}}" class="nav-link  {{ isActive('view/post') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
               All Posts
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('profile.show')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Profile
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>