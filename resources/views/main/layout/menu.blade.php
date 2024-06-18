<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

<a href="index.html" class="logo d-flex align-items-center">
  <h1>Blog</h1>
</a>

<nav id="navbar" class="navbar">
  <ul>
    <li><a href="/">Blog</a></li>
    <li class="dropdown"><a href=""><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
      <ul>
        @foreach($categories as $category)
        <li><a href="#">{{$category->title}}</a></li>
        @endforeach
       
      </ul>
    </li>
    @if (Auth::id())
    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li><a href="{{route('add/post')}}">Add Post</a></li>
    @else
    <li><a href="{{route('login')}}">Login</a></li>
    <li><a href="{{route('register')}}">Register</a></li>
    @endif
  </ul>
</nav><!-- .navbar -->

<div class="position-relative">

  <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
  <i class="bi bi-list mobile-nav-toggle"></i>

  <!-- ======= Search Form ======= -->
  <div class="search-form-wrap js-search-form-wrap">
    <form action="search-result.html" class="search-form">
      <span class="icon bi-search"></span>
      <input type="text" placeholder="Search" class="form-control">
      <button class="btn js-search-close"><span class="bi-x"></span></button>
    </form>
  </div><!-- End Search Form -->

</div>

</div>