<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Stripe;
class HomeController extends Controller
{


   public function index()
   {
    $product=Product::paginate(6);
    return view('home.userpage',compact('product'));
   }
   public function redirect()
   {
     
    $usertype=Auth::user()->usertype;
    if($usertype=='1')
    {
      // $total_products = Product::all()->count(); 
        return view('admin.home');
    }
    else
    {
        $product=Product::paginate(6);
        return view('home.userpage',compact('product'));
    }
   }

   public function product_details($id)
   {
    $product=Product::find($id);

    return view('home.product_details',compact('product'));
   }
   public function add_to_cart(Request $request, $id)
   {

   if (Auth::id())
   {
    $user=Auth::user();

   $product=Product::find($id);
     $cart=new Cart;
     $cart->name=$user->name;
     $cart->email=$user->email;
     $cart->phone=$user->phone;
     $cart->address=$user->address;
     $cart->user_id=$user->id;


     $cart->title=$product->title;

     if($product->discount_price!=null)

     {
        $cart->price=$product->discount_price * $request->quantity;
     }
     else
     {
        $cart->price=$product->price * $request->quantity;
     }
     
     $cart->price=$product->price;
     
     $cart->image=$product->image;
     
     $cart->product_id=$product->id;

     $cart->quantity=$request->quantity;
     

     $cart->save();

     return redirect()->back();

   }
   else 
   {
    return redirect('login');
   }
   }

   public function show_cart()
   {
      if(Auth::id())
      {
         $id=Auth::user()->id;

         $cart=cart::where('user_id','=',$id)->get();
   
         return view ('home.showcart',compact('cart'));
      }
      else{
         return redirect('login');
      }
   }

   public function remove_cart($id)
   {
         $cart=Cart::find($id);
         $cart->delete();
         return redirect()->back();
   }

   public function Cash_on_delivery()

   {
              $user=Auth::user();

              $userid=$user->id;

              $data=Cart::where('user_id', '=',$userid)->get();
              
             foreach($data as $data)
             {
               $order=new order;

               $order->name=$data->name;
               $order->email=$data->email;
               $order->phone=$data->phone;
               $order->address=$data->address;
               $order->user_id=$data->user_id;
               $order->title=$data->title;
               $order->price=$data->price;
               $order->quantity=$data->quantity;
               $order->image=$data->image;

               $order->product_id=$data->product_id;

               $order->payment_status='Cash On Delivery';

               $order->deliver_status='Processing';

               $order->save();

               $cart_id=$data->id;
               $cart=cart::find($cart_id);
               $cart->delete();

             }
             return redirect()->back()->with('message','we received your Order , keep in touch with you');

      
   }
      public function stripe($totalprice)
      {
         return view('home.stripe',compact('totalprice'));
      }
      
      public function stripePost(Request $request,$totalprice)

      {
         
          Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
          Stripe\Charge::create ([
                  "amount" => $totalprice * 100,
                  "currency" => "usd",
                  "source" => $request->stripeToken,
                  "description" => "Thank you for Payment" 
          ]);
          $user=Auth::user();

          $userid=$user->id;

          $data=Cart::where('user_id', '=',$userid)->get();
          
         foreach($data as $data)
         {
           $order=new order;

           $order->name=$data->name;
           $order->email=$data->email;
           $order->phone=$data->phone;
           $order->address=$data->address;
           $order->user_id=$data->user_id;
           $order->title=$data->title;
           $order->price=$data->price;
           $order->quantity=$data->quantity;
           $order->image=$data->image;

           $order->product_id=$data->product_id;

           $order->payment_status='Paid';

           $order->deliver_status='Processing';

           $order->save();

           $cart_id=$data->id;
           $cart=cart::find($cart_id);
           $cart->delete();

         }
        
          Session::flash('success', 'Payment successful!');
                
          return back();
      }

      public function show_orders()
      {

         if(Auth::id())
         {
            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id','=',$userid)->get();
            return view('home.myorders',compact('order'));
         }
         else{
            
            return redirect('login');
         }
      }
      public function cancel_order($id)
      {
 
         $order=Order::find($id);
         $order->deliver_status='You Cancelled the Order';

         $order->save();
         return redirect()->back();
      }
   }

  



