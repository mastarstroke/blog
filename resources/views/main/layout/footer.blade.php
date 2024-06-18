<footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">

    <div class="row g-5">
      <div class="col-lg-4">
        <h3 class="footer-heading">About Blog</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
        <p><a href="about.html" class="footer-link-more">Learn More</a></p>
      </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Navigation</h3>
        <ul class="footer-links list-unstyled">
          <li><a href="/"><i class="bi bi-chevron-right"></i> Home</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i> Categories</a></li>
          <li><a href="{{route('login')}}"><i class="bi bi-chevron-right"></i> Login</a></li>
          <li><a href="{{route('register')}}"><i class="bi bi-chevron-right"></i> Register</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Categories</h3>
        <ul class="footer-links list-unstyled">
            @foreach($categories as $category)
            <li><a href="#"><i class="bi bi-chevron-right"></i> {{$category->title}}</a></li>
            @endforeach

        </ul>
      </div>

      <div class="col-lg-4">
        <h3 class="footer-heading">Recent Posts</h3>

        @php
        use Carbon\Carbon;
        @endphp
        <ul class="footer-links footer-blog-entry list-unstyled">
          @foreach($gen_posts as $posts)
          <li>
            <a href="single-post.html" class="d-flex align-items-center">
              <img src="postimage/{{$posts->image}}" alt="" class="img-fluid me-3">
              <div>
                <div class="post-meta d-block"><span class="date">{{$posts->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($posts->created_at)->format('F jS \ y')}}</span></div>
                <span>{{$posts->title}}</span>
              </div>
            </a>
          </li>
          @endforeach

        </ul>

      </div>
    </div>
  </div>
</div>

<div class="footer-legal">
  <div class="container">

    <div class="row justify-content-between">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <div class="copyright">
          © Copyright <strong><span>Blog</span></strong>. All Rights Reserved
        </div>

        <div class="credits">
          Developed by <a href="#">James</a>
        </div>

      </div>
      </div>
    </div>
  </div>
</div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/script.js"></script>

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>