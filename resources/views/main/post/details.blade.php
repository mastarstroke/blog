<!DOCTYPE html>
<html lang="en">
<head>
  <base href="/public">
@include('main.layout.header')
<style>
  .previews img{
    padding: 5px;
    max-width: 150px;
    width: 80px;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    <!-- menu -->
    @include('main.layout.menu')
    <!-- /.menu -->

<main id="main">
    <section class="single-post-content">
    <div class="container">
        <div class="row">
        <div class="col-md-9 post-content" data-aos="fade-up">

            @php
            use Carbon\Carbon;
            @endphp
            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
            <div class="post-meta"><span class="date">{{$post->category}}</span> <span class="mx-1">&bullet;</span> <span>{{Carbon::parse($post->created_at)->format('F jS \ y')}}</span></div>
            <h1 class="mb-5">{{$post->title}}</h1>

            <figure class="my-4">
                <img src="postimage/{{$post->image}}" alt="" class="img-fluid">
                <figcaption>{{$post->title}} </figcaption>
            </figure>
            <p>{{$post->desc}}</p>
          
            </div><!-- End Single Post Content -->

            <!-- ======= Comments ======= -->
            <div class="comments">
            <h5 class="comment-title py-4">{{count($comments)}} Comments</h5>

            @foreach($comments as $comment)
            <div id="comment" class="comment d-flex mb-4">
                <div class="flex-grow-1 ms-2 ms-sm-3">
                    <div class="comment-meta d-flex align-items-baseline">
                        <h6 class="me-2">{{$comment->users->name}}</h6>
                        <span class="text-muted">{{Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                    </div>
                    <div class="comment-body">{{$comment->comment}}</div>                
                </div>
            </div>
            @endforeach

            </div><!-- End Comments -->

            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

            <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <form id="post_comment">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <textarea class="form-control" id="comment_message" name="comment_message" placeholder="Enter your Comment Here" cols="30" rows="10"></textarea>
                    </div>
                    <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}">
                    <div class="col-12">
                        <button type="submit" id="comment_btn" class="btn btn-primary">Post comment</button>
                    </div>
                </div>
                </form>
            </div>
            </div><!-- End Comments Form -->

        </div>
        <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

            <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">

                <!-- Popular -->
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>
                </div> <!-- End Popular -->

            </div>
            </div>

        </div>
    </div>
    </section>
</main><!-- End #main -->

@include('main.layout.footer')
<script>
    $(document).ready(function() {

    $('#post_comment').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $('#comment_btn').prop('disabled', true)
        .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

        $.ajax({
            type: 'POST',
            url: "{{ route('post/comment') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Comment Posted!');

                $('#comment_btn').prop('disabled', false).html('Post Comment');
                $('#post_comment')[0].reset();
                location.reload();

                // $('#comment').append('<div class="post" data-id="' + response.id + '"><h6>' + response.title + '</h6><span>'+ response.name +'</span> </div>');

            },
            error: function(xhr) {
            if(xhr.responseJSON && xhr.responseJSON.failed) {
                alert(xhr.responseJSON.failed);

                window.location.href = "{{url('/login')}}";
            }
            else{
                alert('an unexpected error occurred');
            }

            console.error(xhr.responseText);
            $('#submit_button').prop('disabled', false).html('Post Comment');

            }
         });
    });
});

</script>

</body>
</html>
