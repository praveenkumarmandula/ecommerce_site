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
      <title>MY ORDERS</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <style>
      .header{
         font-size:30px;
         padding-top:10px;
      }
      .center{
         margin:auto;
         width:80%;
         padding:30px;
         text-align:center;
        

      }

      table,th,td
       {
         border:1px solid black;
      }
      .th_deg
      {
         font-weight:bold;
         padding:10px;
         font-size:20px;
         background-color:skyblue;
      }
   </style>
   <body>
      
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

        <center><h1 class="header" style="color:green;">MY ORDERS</h1></center>
        <br>
      <div>
         <table class="center">
            <tr>
               <th class="th_deg">Product title</th>
               <th class="th_deg">Quantity</th>
               <th class="th_deg">Price</th>
               <th class="th_deg">Payment Status</th>
               <th class="th_deg">Delivery Status</th>
               <th class="th_deg">Image</th>
               <th class="th_deg">Cancel Order</th>
            </tr>
            @foreach($order as $order)
            <tr>
               <td>{{$order->title}}</td>
               <td>{{$order->quantity}}</td>
               <td>{{$order->price}}</td>
               <td>{{$order->payment_status}}</td>
               <td>{{$order->deliver_status}}</td>
               <td>
                  <img height="100px" width="100px" src="/product/{{$order->image}}" >
               </td>
               <td>
                  @if($order->deliver_status=='processing')
                  
                  <a href="{{url('cancel_order',$order->id)}}" onclick="return confirm'are you sure to cancel the order')"class="btn btn-danger">Cancel Order</a>
                  
                  @else

                  <p style="color:red;">Not Allowed</p>

                  @endif

               </td>
            </tr>
            @endforeach
         </table>
      </div>
      <br>
      <br/>
      <br>
   </body>
</html>