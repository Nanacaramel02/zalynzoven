<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Staff;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderItem;
use App\Models\Reservation;

class HomeController extends Controller
{
    public function index (){
        $data=food::all();
        $data2=staff::all();

        if (Auth::id()){
            
            $user_id=Auth::id();
            $count=cart::where('user_id',$user_id)->count();

            return view("home",compact("data", "data2", "count"));

        } else {
            return view("home",compact("data", "data2"));
        }
    }

    public function redirects (){
        $usertype= Auth::user()->userType;
        $data=food::all();
        $data2=staff::all();

        if($usertype==1){
            return view("admin2.adminhome2");
        } else {
            $user_id=Auth::id();
            $count=cart::where('user_id',$user_id)->count();

            return view("home",compact("data", "data2", "count"));
        }
    }

    public function order (){
        $data=food::all();

        if (Auth::id()){
            
            $user_id=Auth::id();
            $count=cart::where('user_id',$user_id)->count();

            return view("order",compact("data", "count"));

        } else {
            return view("order",compact("data"));
        }
    }

    public function addtocart (Request $request, $id){
        if (Auth::id()){
            
            $user_id=Auth::id();
            $foodid=$id;
            $quantity=$request->quantity;

            // Check if the quantity is 0
            if ($quantity == 0) {
                // Flash an error message to the session
                return redirect()->back()->with('error', 'Quantity cannot be zero.');
            }

            $cart=new cart;

            $cart->user_id=$user_id;
            $cart->food_id=$foodid;
            $cart->quantity=$quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
        
    }

    public function showcart (Request $request, $id){

        $count=cart::where('user_id',$id)->count();

        $data=cart::where('user_id',$id)->join('food', 'carts.food_id', '=', 'food.id')->get();

        $data2=cart::select('*')->where('user_id', '=', $id)->get();

        return view('showcart', compact('count', 'data', 'data2'));
        
    }

    public function remove ($id){
        $data=cart::find($id);

        $data->delete();

        return redirect()->back();
        
    }

    public function orderconfirm(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Please log in to place an order.');
        }
    
        $order = new Order;
        
        // Customer details
        $order->name        = $request->name;
        $order->email       = $request->email;
        $order->phone       = $request->phone;
        $order->servicetype = $request->servicetype;
        $order->address     = $request->address;
        $order->address     = $request->address;
        $order->total_amount     = $request->total_amount;
        
        $order->save(); // Save order first to get the order ID
    
        $order_id = $order->id; // Get the ID of the newly created order
    
        // Loop through each food item submitted in the request and save in order_items table
        foreach ($request->foodname as $key => $foodname) {
            $orderItem = new OrderItem;
            $orderItem->order_id  = $order_id;  // Associate item with the order
            $orderItem->foodname  = $foodname;
            $orderItem->price     = $request->price[$key];
            $orderItem->quantity  = $request->quantity[$key];
    
            $orderItem->save();
        }
    
        // Redirect to payment page with the last order ID
        // return redirect()->route('payment', $order_id);

        return redirect()->route('payment', ['id' => $order_id]);

    }

    public function payment($id)
    {
        if (!Auth::check()) {
            return redirect('/order')->with('error', 'Please log in to proceed.');
        }

        $order = Order::find($id);
        if (!$order) {
            return redirect('/order')->with('error', 'Order not found.');
        }

        $count = Cart::where('user_id', auth()->id())->count(); // Get cart item count
        $total = $order->total_amount; // Get total amount

        return view('payment', compact('order', 'count', 'total'));
    }

    public function makepayment(Request $request)
    {
        $data = new Payment; 

        // Assign payment details
        $data->order_id = $request->order_id;
        $data->card_no = $request->card_no;
        $data->exp = $request->exp;
        $data->cvv = $request->cvv;
        $data->paymentmethod = $request->paymentmethod;

        // Handle proof of payment image upload
        if ($request->hasFile('proof')) {
            $image = $request->file('proof');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('proofimage'), $imageName);
            $data->proof = $imageName;
        }

        // Save payment data
        $data->save();

        $order_id = $data->id;

        // Retrieve user info if authenticated
        // if (auth()->check()) {
            $user_id = auth()->id();
            $count = Cart::where('user_id', $user_id)->count(); // Get cart item count

            // Fetch order details
            $order = Order::find($request->order_id);
            $total = $order ? $order->total_amount : 0; // Default to 0 if order not found

            // return view("successorder", compact("data", "count", "total", "order_id"));
            // return redirect()->route('successorder')->with('success', 'Make and order successfully.');
            \Log::info('Redirecting to successorder with order_id: ' . $data->order_id);

            return redirect()->route('successorder', ['id' => $data->order_id])
                ->with('success', 'Make and order successfully.');



        // } 

        // return redirect()->route("homepage")->with("error", "Please log in to make a payment.");
    }

    public function successorder($id)
    {
        \Log::info('Fetching order with ID: ' . $id);

        $order = Order::find($id);
        
        if (!$order) {
            return redirect()->route("homepage")->with("error", "Order not found.");
        }

        $orderItems = OrderItem::where('order_id', $id)->get();
        $payment = Payment::where('order_id', $id)->first();
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;

        // Ensure payment is found before accessing id
        $payment_id = $payment ? $payment->id : null;
        
        return view("successorder", compact("order", "orderItems", "payment", "count", "payment_id"));
    }



    // public function successorder($order_id)
    // {
    //     // Retrieve order details
    //     $order = Order::find($order_id);
        
    //     if (!$order) {
    //         return redirect()->route("homepage")->with("error", "Order not found.");
    //     }

    //     // Retrieve order items
    //     $orderItems = OrderItem::where('order_id', $order_id)->get();

    //     // Retrieve payment details
    //     $payment = Payment::where('order_id', $order_id)->first();
        
    //     // Get user cart count if authenticated
    //     $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
        
    //     return view("successorder", compact("order", "orderItems", "payment", "count"));
    // }





    public function reservation(Request $request){
        $data = new reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->status = $request->status;
        $data->message = $request->message;

        $data->save();

        return redirect()->route('successreservation', ['id' => $data->id]);
    }

    public function successreservation($id) {
        $reservation = Reservation::find($id);
        
        // Pastikan anda mendapatkan jumlah item dalam cart
        $count = Cart::where('user_id', auth()->id())->count();
    
        return view('successreservation', compact('reservation', 'count'));
    }
    
    
   

}
