<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">
 @include('user.layout.header')
 <style>
    .text-limit {
        display: -webkit-box;
        -webkit-box-orient:vertical;
        -webkit-line-clamp: 2;

        overflow:hidden;
        text-overflow:ellipsis;
        white-space:normal;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('user.layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    @include('user.layout.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Alert here -->
        <div class="col-12">
        </div>

        <div class="card">
        <div class="card-header">
            <h4>Edit Post</h4>
        </div>
        <div class="card-body">
            <form id="edit_post" enctype="multipart/form-data">
              @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="">Category</label>
                        <select class="form-select form-control" id="category" name="category">
                            <option value="{{$post->category}}">{{$post->category}}</option>
                            @foreach($cates as $cate)
                            <option value="{{$cate->title}}">{{$cate->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Title*</label>
                        <input type="text" class="form-control" value="{{$post->title}}" id="title" name="title" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description*</label>
                        <textarea id="desc" name="desc" rows="3" class="form-control" required>{{$post->desc}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                    <img height="170" width="200" src="postimage/{{$post->image}}" alt="Old Image">
                    </div>
          
                    <div class="col-md-6 mb-3">
                    <label for="">IMAGE*</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>

                    <!-- Preview Images -->
                    <div class="col-md-12 my-3">
                        <div id="previews">
                            <img src="" id="imagePreview" style="display:none; max-width: 200px; max-height: 200px; margin-top:10px;" alt="">
                        </div>
                    </div>
                      <!-- Preview Images ends !-->

                    <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">

                    <div class="col-md-12">
                        <button id="update_post" class="btn btn-primary">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
      </div>

      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('user.layout.footer')
<script>
    $(document).ready(function() {

    $('#image').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#imagePreview').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(this.files[0]);
    });

    $('#edit_post').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        var id= $('#post_id').val();

        $('#update_post').prop('disabled', true)
        .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

        $.ajax({
            type: 'POST',
            url: "{{ url('update/post') }}" + '/' + id,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Post Updated successfully!');

                $('#update_post').prop('disabled', false).html('Submit');
                $('#edit_post')[0].reset();
                
                $('#previews').empty();
            },
            error: function(xhr) {
                alert('An error occured, please try again');
            }
        });
    });

});
</script>
</body>
</html>




