<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orders</title>
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

  </head>
  <style>
    
     .table_deg
        {
            border:1px solid grey;
            table-layout: auto;
           
        } 
        th,td{
          border:1px solid grey;
        }
       

    .head{
        padding-bottom:30px;
        font-size:30px;
    }
    .image{
        height: 100px;
        width: 120px;
    }
    .th_deg{
      background-color:tomato;
    }
  </style>
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
             <center><h1 class="head">ALL ORDERS</h1></center>

             <form action="{{url('search')}}" method="GET">
               @csrf
           <center>   <input style="color:black;" type="text" name="search" placeholder="search">
              <input type="submit" value="Search" class="btn btn-primary"></center>
             </form>
             <br/>

            <table class="table_deg">
                <tr class="th_deg">
                    <th style="padding:7px;">Name</th>
                    <th style="padding:7px;">Email</th>
                    <th style="padding:7px;">Address</th>
                    <th style="padding:7px;">Phone</th>
                    <th style="padding:7px;">Product Title</th>
                    <th style="padding:7px;">Quantity</th>
                    <th style="padding:7px;">Price</th>
                    <th style="padding:7px;">Payment status</th>
                    <th style="padding:7px;">Delivery status</th>
                    <th style="padding:7px;">Image</th>
                    <th >Delivered</th>
                    <th style="padding:7px;">Print PDF</th>
                    <th style="padding:7px;">Send Email</th>
                    
                </tr>
                @forelse($orders as $orders)
                <tr>

                    <td style="text-align:center;">{{$orders->name}}</td>
                    <td style="text-align:center;">{{$orders->email}}</td>
                    <td style="text-align:center;">{{$orders->address}}</td>
                    <td style="text-align:center;">{{$orders->phone}}</td>
                    <td style="text-align:center;">{{$orders->title}}</td>
                    <td style="text-align:center;">{{$orders->quantity}}</td>
                    <td style="text-align:center;">{{$orders->price}}</td>
                    <td style="text-align:center;">{{$orders->payment_status}}</td>
                    <td style="text-align:center;">{{$orders->deliver_status}}</td>
                    <td style="text-align:center;">
                        <img class="image" src="/product/{{$orders->image}}">
                    </td>
                    <td style="text-align:center;"><a onclick="return confirm('Are you Sure Item will be Delivered')" class="btn btn-success" href="{{url('delivered',$orders->id)}}">Delivered</a></td>
                    <td style="text-align:center;"><a onclick="return confirm('Are you Sure to print pdf')" class="btn btn-secondary"
                    href="{{url('print_pdf',$orders->id )}}">Print<a></td>
                    <td><a class="btn btn-info"
                    href="{{url('send_email',$orders->id )}}">Send Email<a></td>
                </tr>
                @empty
              <tr>
                <td colspan="16" style="text-align:center;">
                  NO DATA FOUND
                </td>
              </tr>
                @endforelse
            </table>


             </div>
        </div>
        <!-- @include('admin.body') -->
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <!-- @include('admin.footer') -->
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