
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Show_product</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
<style>
    .center{

        margin-top:30px;
        margin:auto;
        border:3px solid white;
        width:50%;
        text-align:center;
        color:white;


        }

        .img_size{
            height: 100px;
            width: 100px;
        }
        .tr_color{
            color:red;
        }
        .th_size{
            padding:30px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
                @if(session()->has('message'))

                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert"aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
              <div class="content-wrapper">
            <table class="center" width=100%>
                <tr class="tr_color">
                    <th class="th_size">Title</th>
                    <th class="th_size">Description</th>
                    <th class="th_size">Quantity</th>
                    <th class="th_size">Price</th>
                    <th class="th_size">Discount_price</th>
                    <!-- <th>Category</th> -->
                    <th class="th_size">Image</th>
                    <th class="th_size">Edit</th>
                    <th class="th_size">Delete</th>

                </tr>
                @foreach($show as $data)
                        <tr>
                            <td>{{$data->title}}</td>
                            <td>{{$data->description}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->discount_price}}</td>
                            <!-- <td>{{$data->category}}</td> -->
                            <td>
                                <img class="img_size" src="/product/{{$data->image}}">
                            </td>
                            <td>
                              <a  class="btn btn-success"href="{{url('edit_product',$data->id)}}">Edit</a>
                            </td>
                            <td>
                              <a onclick="return confirm('are you sure to Delete')" class="btn btn-danger" href="{{url('delete_product',$data->id)}}">Delete</a>
                            </td>
                        </tr>
                @endforeach
            </table>
              </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>