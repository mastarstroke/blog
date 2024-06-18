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

    <section class="content mx-5">
      <div class="container-fluid">

        <!-- Alert here -->
        <div class="col-12">
        </div>

     <div class="card">
        <div class="card-header">
            <h4>Add Post</h4>
        </div>
        <div class="card-body">
            <form id="add_post" enctype="multipart/form-data">
              @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="">Category</label>
                        <select class="form-select form-control" id="category" name="category">
                            <option value="">Select a category</option>
                            @foreach($cates as $cate)
                            <option value="{{$cate->title}}">{{$cate->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description*</label>
                        <textarea id="desc" name="desc" rows="3" class="form-control" required></textarea>
                    </div>

                      <!-- Preview Images -->
                      <div class="col-md-12 my-3">
                        <div id="previews">
                            <img src="" id="imagePreview" style="display:none; max-width: 200px; max-height: 200px; margin-top:10px;" alt="">
                        </div>
                    </div>
                      <!-- Preview Images ends !-->
          
                    <div class="col-md-6 mb-3">
                    <label for="">IMAGE*</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <button id="upload_post" class="btn btn-primary">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
      </div>

      </div>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


@include('main.layout.footer')

<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> -->

<script>
    $(document).ready(function() {

    $('#image').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#imagePreview').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(this.files[0]);
    });

    $('#add_post').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        // formData.append('title',$('#title').val());
        // formData.append('desc', $('#desc').val());

        $('#upload_post').prop('disabled', true)
        .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

        $.ajax({
            type: 'POST',
            url: "{{ route('store/post') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Post added successfully!');

                $('#upload_post').prop('disabled', false).html('Submit');
                $('#add_post')[0].reset();
                
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
