<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">
 @include('admin.layout.header')
 <style>
  .previews img{
    padding: 3px;
    height: 90px;
    width: 100px;
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
  @include('admin.layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">User</span>
    </a>

    <!-- Sidebar -->
    @include('admin.layout.sidebar')
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
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form id="add_category" action="" method="POST" enctype="multipart/form-data">
            @csrf
            
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" id="title" class="form-control" name="title" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea id="desc" name="desc" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="col-md-6 my-3">
                        <input type="file" id="image" name="image" class="form-control" required>
                    </div>

                    <div class="col-md-12 my-3">
                        <div id="previews">
                            <img src="" id="imagePreview" style="display:none; max-width: 200px; max-height: 200px; margin-top:10px;" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" id="upload_category" class="btn btn-primary">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
      </div>

      </div>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('admin.layout.footer')
<script>
    $(document).ready(function() {

    $('#image').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#imagePreview').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(this.files[0]);
    });

    $('#add_category').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        // formData.append('title',$('#title').val());
        // formData.append('desc', $('#desc').val());

        $('#upload_category').prop('disabled', true)
        .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

        $.ajax({
            type: 'POST',
            url: "{{ route('store/category') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Category added successfully!');

                $('#upload_category').prop('disabled', false).html('Submit');
                $('#add_category')[0].reset();
                
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
