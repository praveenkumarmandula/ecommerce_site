<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <!-- Site Metas -->
      <meta name="keywords" content=""/>
      <meta name="description" content=""/>
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Shopee For Men</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .center{
            margin:auto;
            width: 50%;
            text-align:center;
            padding:30px;
        }
        table,th,td
        {

            border:1px solid grey;
        }
        .th_deg
        {
            font-size:30px;
            padding:5px;
            background:skyblue;
        }
        .image_size
        {
            height: 100px;
            width: 100px;
        }
        .total_price
        {
            font-size:30px;
            padding:40px;
        }
        .cart{
            font-size:50px;
            padding:30px;
            text-align:center;
            color:green;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         @if(session()->has('message'))
              
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert"aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
         @endif
     
         <h1 class="cart">CART</h1>
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Name</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalprice = 0;  ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->title}}</td>
                <td>{{$cart->quantity}} </td>
                <td>{{$cart->price}} </td>
                <td> <img class="image_size" src="/product/{{$cart->image}}"></td>
                <td><a  class="btn btn-danger" onclick="return confirm('Are you sure to REMOVE product in Cart')" href="{{url('remove_cart',$cart->id)}}">Remove</a></td>
            </tr>
            <?php   $totalprice = $totalprice +  $cart->price      ?>
            @endforeach
            
        </table>
        <div>
            <h1 class="total_price">Total Price : {{$totalprice}}/- </h1>
        </div>
        <h1 style="font-size:25px;padding-bottom:15px;">Make An Order</h1>
        <a href="{{url('Cash_on_delivery') }}" class="btn btn-success">Cash On Delivery</a>
        <a href="{{url('stripe',$totalprice)}}" class="btn btn-primary">Pay Using Cards</a>
      </div>
      <!-- footer start -->
     <!-- @include('home.footer') -->
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="https://en.wikipedia.org/wiki/Shopee">Shopee For Men</a><br>
         
            Distributed By <a href="https://www.flipkart.com/" target="_blank">Flipkart</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>