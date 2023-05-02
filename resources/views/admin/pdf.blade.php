<!DOCTYPE html>
<html>
    <head>
        <title>pdf download</title>
    </head>
    <body>
        <h1>
            ORDER DETAILS
        </h1>

        Customer Slno : <h3>{{$order->id}}</h3>
        Customer Name : <h3>{{$order->name}}</h3>
        Customer Email : <h3>{{$order->email}}</h3>
        Customer Phone : <h3>{{$order->phone}}</h3>
        Customer Address : <h3>{{$order->address}}</h3>
        Customer User_Id : <h3>{{$order->user_id}}</h3>
        Product Name : <h3>{{$order->title}}</h3>
        Product Quantity : <h3>{{$order->quantity}}</h3>
        Product Price : <h3>{{$order->price}}</h3>
        Product Id : <h3>{{$order->product_id}}</h3>
        Payment Status : <h3>{{$order->payment_status}}</h3>
        Delivery Status : <h3>{{$order->deliver_status}}</h3>
        Order created : <h3>{{$order->created_at}}</h3>
        Order updated : <h3>{{$order->updated_at}}</h3>
        Product Image:<br><br>
        <img height="200px" width="200px" src="product/{{$order->image}}">
       

    </body>
</html>
