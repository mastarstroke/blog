<!DOCTYPE html>
<html lang="en">

<head>
@include('main.layout.header')
<style>
      .text-limit {
        display: -webkit-box;
        -webkit-box-orient:vertical;
        -webkit-line-clamp: 6;

        overflow:hidden;
        text-overflow:ellipsis;
        white-space:normal;
    }
</style>
</head>

<body>

  <!-- ======= Header Menu ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    @include('main.layout.menu')
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-1.jpg');">
                    <div class="img-bg-inner">
                      <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-2.jpg');">
                    <div class="img-bg-inner">
                      <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-3.jpg');">
                    <div class="img-bg-inner">
                      <h2>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-4.jpg');">
                    <div class="img-bg-inner">
                      <h2>9 Half-up/half-down Hairstyles for Long and Medium Hair</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    @php
    use Carbon\Carbon;
    @endphp
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">

          <div class="col-lg-4">

            <div class="post-entry-1 lg">
              <a href="{{route('post_details', $lg_post->id)}}"><img src="postimage/{{$lg_post->image}}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">{{$lg_post->categories->title}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($lg_post->created_at)->format('F jS \ y')}}</span></div>
              <h2><a href="">{{$lg_post->title}}</a></h2>
              <p class="mb-4 d-block">{{$lg_post->desc}}</p>

              <div class="d-flex align-items-center author">
                <div class="name">
                  <h3 class="m-0 p-0">{{$lg_post->users->name}}</h3>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-8">
            <div class="row g-5">
              <div class="col-lg-4 border-start custom-border">
                
                @foreach($gen_posts as $gen_post)
                <div class="post-entry-1">
                  <a href="{{route('post_details', $gen_post->id)}}"><img src="postimage/{{$gen_post->image}}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">{{$gen_post->categories->title}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($gen_post->created_at)->format('F jS \ y')}}</span></div>
                  <h2><a href="{{route('post_details', $gen_post->id)}}">{{$gen_post->title}}</a></h2>
                </div>
                @endforeach
              </div>

              <div class="col-lg-4 border-start custom-border">
                @foreach($sec_posts as $sec_post)
                <div class="post-entry-1">
                  <a href="{{route('post_details', $sec_post->id)}}"><img src="postimage/{{$sec_post->image}}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">{{$sec_post->categories->title}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($sec_post->created_at)->format('F jS \ y')}}</span></div>
                  <h2><a href="{{route('post_details', $sec_post->id)}}">{{$sec_post->title}}</a></h2>
                </div>
                @endforeach
              </div>

              <!-- Trending Section -->
              <div class="col-lg-4">
                <div class="trending">
                  <h3>Trending</h3>
                  <ul class="trending-post">
                    @foreach($trendings as $trending)
                    <li>
                      <a href="{{route('post_details', $trending->id)}}">
                        <span class="number">1</span>
                        <h3>{{$trending->title}}</h3>
                        <span class="author">{{$trending->users->name}}</span>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div> <!-- End Trending Section -->
            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>Culture</h2>
          <div><a href="" class="more">See All Culture</a></div>
        </div>

        <div class="row">
          <div class="col-md-9">

          @foreach($latest_cultures as $culture)
            <div class="d-lg-flex post-entry-2">
              <a href="{{route('post_details', $culture->id)}}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="postimage/{{$culture->image}}" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">{{$culture->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($culture->created_at)->format('F jS \ y')}}</span></div>
                <h3><a href="{{route('post_details', $culture->id)}}">{{$culture->title}}</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
                <div class="d-flex align-items-center author">
                  <div class="name">
                    <h3 class="m-0 p-0">{{$culture->users->name}}</h3>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>

          <div class="col-md-3">

            @foreach($cultures as $latest_culture)
            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">{{$latest_culture->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($latest_culture->created_at)->format('F jS \ y')}}</span></div>
              <h2 class="mb-2"><a href="{{route('post_details', $latest_culture->id)}}">{{$latest_culture->title}}</a></h2>
              <span class="author mb-3 d-block">{{$latest_culture->users->name}}</span>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </section><!-- End Culture Category Section -->

    <!-- ======= Tourism Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>Tourism</h2>
          <div><a href="#" class="more">See All Business</a></div>
        </div>

        <div class="row">
        
        <div class="col-md-3">
            @foreach($tourisms as $tourism)
            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">{{$tourism->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($tourism->created_at)->format('F jS \ y')}}</span></div>
              <h2 class="mb-2"><a href="{{route('post_details', $tourism->id)}}">{{$tourism->title}}</a></h2>
              <span class="author mb-3 d-block">{{$tourism->users->name}}</span>
            </div>
            @endforeach

          </div>
          <div class="col-md-9 order-md-2">

          @foreach($latest_tourisms as $tourisms)
            <div class="d-lg-flex post-entry-2">
              <a href="{{route('post_details', $tourisms->id)}}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="postimage/{{$tourisms->image}}" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">{{$tourisms->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($tourisms->created_at)->format('F jS \ y')}}</span></div>
                <h3><a href="desc-post.html">{{$tourisms->title}}</a></h3>
                <p class="text-limit">{{$tourisms->desc}}</p>
                <div class="d-flex align-items-center author">
                  <div class="name">
                    <h3 class="m-0 p-0">{{$tourisms->users->name}}</h3>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </section><!-- End Tourism Category Section -->

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>Lifestyle</h2>
          <div><a href="#" class="more">See All Lifestyle</a></div>
        </div>

        <div class="row g-5">
          
          <div class="col-lg-4">
          <div class="post-entry-1 lg">
              <a href="{{route('post_details', $lifestyle->id)}}"><img src="postimage/{{$lifestyle->image}}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">{{$lifestyle->categories->title}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($lifestyle->created_at)->format('F jS \ y')}}</span></div>
              <h2><a href="single-post.html">{{$lifestyle->title}}</a></h2>
              <p class="mb-4 d-block">{{$lifestyle->desc}}</p>

              <div class="d-flex align-items-center author">
                <div class="name">
                  <h3 class="m-0 p-0">{{$lifestyle->users->name}}</h3>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-8">
            <div class="row g-5">
              <div class="col-lg-4 border-start custom-border">

                @foreach($lifestyle_one as $lifestyle)
                <div class="post-entry-1">
                  <a href="{{route('post_details', $lifestyle->id)}}"><img src="postimage/{{$lifestyle->image}}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">{{$lifestyle->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($lifestyle->created_at)->format('F jS \ y')}}</span></div>
                  <h2><a href="{{route('post_details', $lifestyle->id)}}">{{$lifestyle->title}}</a></h2>
                </div>
                @endforeach

              </div>
              <div class="col-lg-4 border-start custom-border">
                @foreach($lifestyle_two as $lifestyle)
                <div class="post-entry-1">
                  <a href="{{route('post_details', $lifestyle->id)}}"><img src="postimage/{{$lifestyle->image}}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">{{$lifestyle->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($lifestyle->created_at)->format('F jS \ y')}}</span></div>
                  <h2><a href="{{route('post_details', $lifestyle->id)}}">{{$lifestyle->title}}</a></h2>
                </div>
                @endforeach
              </div>

            <div class="col-lg-4">
              @foreach($randoms as $lifestyle)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$lifestyle->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($lifestyle->created_at)->format('F jS \ y')}}</span></div>
                <h2 class="mb-2"><a href="{{route('post_details', $lifestyle->id)}}">{{$lifestyle->title}}</a></h2>
                <span class="author mb-3 d-block">{{$lifestyle->users->name}}</span>
              </div>
              @endforeach
          </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section><!-- End Lifestyle Category Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 @include('main.layout.footer')

</body>

</html>
