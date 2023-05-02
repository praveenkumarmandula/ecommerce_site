
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit_Products</title>
    <!-- plugins:css -->
    <base href="/public">
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
        .div_pcenter
        {
            text-align:center;
            padding-top:30px;
        }
        .head{
            font-size:30px;
        }
        .textcolor{
            color:black;
            padding-bottom:20px;
        }
        label 
        {
            display:inline-block;
            width: 200px;
        }
      
       .div_design
       {
        padding-bottom: 15px;
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
                 <div class="div_pcenter">
                    <h2 class="head">EDIT PRODUCT</h2>
                    <form action="{{url('/update_product',$product->id)}}" method=POST enctype="multipart/form-data">
                        @csrf
                        <br>
                        <div class="div_design">
                          <label>Product_Title</label>
                          <input class="textcolor" type="text" name="Title" placeholder="enter Title" value="{{$product->title}}">
                        </div>
                        <div class="div_design">
                          <label>Product_Description</label>
                          <input class="textcolor" type="text" name="Description" placeholder="enter Description"value="{{$product->description}}">
                        </div>
                    
                        <div class="div_design">
                          <label>Product_Quantity</label>
                          <input class="textcolor" type="text" name="Quantity"value="{{$product->quantity}}">
                        </div>
                        
                        <div class="div_design">
                          <label>Product_Price</label>
                          <input class="textcolor" type="number" name="Price" placeholder="enter price" value="{{$product->price}}">
                        </div>
                        
                        <div class="div_design">
                          <label>Discount_price</label>
                          <input class="textcolor" type="text" name="Discount_price" placeholder="enter the value" 
                          value="{{$product->discount_price}}">
                        </div>
                        <div class="div_design">
                          <label>Product_Category</label>
                             <select class="textcolor" name="category">
                                    <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                    @foreach($category as $category)
                                    <option value="">{{$category->category_name}}</option>
                                   
                                    @endforeach
                                   
                              </select>

                        </div>
                        <br>
                        <br>
                        <div class="div_design">
                          <label>Current Image</label>
                          <img style="margin:auto;" src="/product/{{$product->image}}" height="100px" width="100px" alt="">
                        </div>


                        <div class="div_design">
                          <label>Product_Image</label>
                          <input type="file" name="Image">
                        
                          <input class="btn btn-success"type="submit" value="Update Product">
                        </div>
                    </form>
                 </div>

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