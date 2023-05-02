<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{

    public function view_category()
    {
        $data=Category::all();

        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {

     $data= new Category;
     $data->category_name=$request->category;

     $data->save();
     return redirect()->back()->with('message','category added successfully');
    }
    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category deleted successfully');
    }
    public function edit_category($id)
    {
        $data=Category::find($id);
        $data->with();
        return redirect()->back();
    }
   public function view_product()
   {
    $category=Category::all();
    
    return view('admin.product',compact('category'));
   }
   public function add_product(Request $request)
   {
    $product=new Product;

    $product->title=$request->Title;
    $product->description=$request->Description;
    $product->price=$request->Price;
    $product->discount_price=$request->Discount_price;
    $product->quantity=$request->Quantity;
    $product->category=$request->category;

    $image=$request->Image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->Image->move('product',$imagename);
    $product->Image=$imagename;

    $product->save();
    return redirect()->back()->with('message','product added successfully');



   }

   public function show_product()
   {
    $show=Product::all();
    // echo $show;
    // exit;
    return view('admin.show_product',compact('show'));
   }
   public function delete_product($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','product deleted successfully');
    }
    public function edit_product($id)
    {
        $product=Product::find($id);
        $category=Category::all();


        return view('admin.edit_product',compact('product','category'));
    }

    public function update_product(Request $request,$id)
    {
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;
        
        $image=$request->Image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->Image->move('product',$imagename);
            $product->Image=$imagename;
        }

        $product->save();
      

        return redirect('/show_product')->with('message','updated   successfully');

    }

    public function orders()
    {
        $orders=Order::all();

        return view('admin.orders',compact('orders'));
    }

    public function delivered($id)
    {
        $delivered=Order::find($id);
        $delivered->deliver_status="delivered";
        $delivered->save();

        return redirect()->back();

    }
    public function print_pdf($id)
    {
        $order=Order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
       
         return $pdf->download('order_details.pdf');
        
    }
    public function send_email($id)
    {

        $order=Order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order=Order::find($id);
       
        $details=[
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' =>$request->body,
            'button' =>$request->button,
            'url' =>$request->url,
            'lastline' => $request->lastline,
        ];
       

        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back();
    }

    public function searchdata(Request $request)
    {
        $searchText=$request->search;
        $orders=Order::where('name','LIKE',"%$searchText%")
                      ->orWhere('phone','LIKE',"%$searchText%")
                      ->orWhere('email','LIKE',"%$searchText%")
                      ->orWhere('title','LIKE',"%$searchText%")->get();

        return view('admin.orders',compact('orders'));
    }
}
