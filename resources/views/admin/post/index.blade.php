<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
 @include('admin.layout.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

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
        <div class="col-12">

        <!-- I HAD TO COMMENT THE SEARCH BOX MADE BY ME OUT BECCAUSE I ALREADY 
        USE DATATABLE WHICH ALSO COME WITH THE QUICK SEARCH FEATURES -->

        <!-- <form action="{{route('posts.search')}}" method="GET">
          <input type="text" name="search" placeholder="Search by name">
          <button type="submit">Search</button>
        </form> -->

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('add/post')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                        Add New Post</a>
                </div>
            </div>
        </div><!-- card-header end  -->

        <div class="card-body">
            <table  id="table_id" class="display">
                <thead>
                    <tr>
                        <th style="padding: 7px;">Category</th>
                        <th style="padding: 7px;">Title</th>
                        <th style="padding: 7px;">Desc</th>
                        <th style="padding: 7px;">Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td style="padding: 7px;">{{$post->category}}</td>
                    <td style="padding: 7px;">{{$post->title}}</td>
                    <td style="padding: 7px;">{{$post->desc}}</td>
                    <td style="padding: 7px;">
                    <img width="50" height="50" src="/postimage/{{$post->image}}" alt="">
                    </td>
                    <td style="padding: 7px;">                        
                        <!-- edit and delete here -->
                        <a href="{{route('admin/edit/post', $post->id)}}"
                        class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i>
                        </a>
                    </td>
                    </td>
                    <td style="padding: 7px;">
                    <button class="btn btn-outline-danger btn-sm delete_button" data-id="{{$post->id}}">
                            <i class="fas fa-trash"></i></a>
                    </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table><!-- datatable end  -->
        </div><!-- card-body end  -->
    </div><!-- col-12 end -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('admin.layout.footer')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});

$(document).on('click', '.delete_button', function() {
    var id = $(this).data('id');
    var $deletedRow = $(this).closest('tr');

    if (confirm('Are sure you want to delete this data?')) {

      $deletedRow.remove();
      
      $.ajax({
        type: 'DELETE',
        url: "{{url('admin/delete/post')}}" + '/' + id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
          "_token": "{{csrf_token()}}"
        },
        successs: function(response) {
          alert('Data deleted successfully!');

        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }
});
</script>
</body>
</html>
