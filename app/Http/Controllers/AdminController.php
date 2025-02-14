<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Staff;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\OrderItem;

class AdminController extends Controller
{

    public  function adminhome(){
        $data=user::all();

        if (!$data) {
            $data = collect();  // Return empty collection if no data
        }

        return view("admin2.adminhome2",compact("data"));
    }

    public  function user(){
        $data=user::all();

        if (!$data) {
            $data = collect();  // Return empty collection if no data
        }

        return view("admin2.users2",compact("data"));
    }

    public  function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public  function foodmenu(){
        $data=food::all();

        if (!$data) {
            $data = collect();  // Return empty collection if no data
        }
        return view("admin2.foodmenu",compact("data"));
    }

    public  function addnewmenu(){
        $data=food::all();
        return view("admin2.addnewmenu",compact("data"));
    }


    public function uploadfood(Request $request){
        $data = new Food;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
    
            $destinationPath = public_path('foodimage'); 
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
    
            $image->move($destinationPath, $imagename);
            $data->image = $imagename;
        } else {
            return back()->with('error', 'Image upload failed');
        }
    
        $data->title = $request->title;
        $data->price = $request->price;
        $data->type = $request->type;
        $data->description = $request->description;
    
        $data->save();
    
        // Fetch all food items instead of passing single item
        $data = Food::all();
        
        return redirect()->route('foodmenu')->with('success', 'Food item added successfully');
        // return view("admin2.foodmenu", compact("data"));
    }

    public  function updateproduct($id){
        $data=food::find($id);

        return view("admin2.updatefood",compact("data"));
    }

    public function update(Request $request, $id){
        $data2 = food::find($id);
        
        if (!$data2) {
            return redirect()->back()->with('error', 'Food item not found');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foodimage'), $imageName);
            $data2->image = $imageName;
        }

        $data2->title = $request->title;
        $data2->price = $request->price;
        $data2->type = $request->type;
        $data2->description = $request->description;
        $data2->save();

        // Fetch all food items instead of passing single item
        $data = Food::all();

        return redirect()->route('foodmenu')->with('success', 'Food item updated successfully');


        // return view("admin2.foodmenu",compact("data"));
    }

    public  function deleteproduct($id){
        $data=food::find($id);
        $data->delete();
        return redirect()->back();
    }





    public  function viewstaff(){
        $data=staff::all();

        if (!$data) {
            $data = collect();  // Return empty collection if no data
        }
        return view("admin2.adminstaff",compact("data"));
    }

    public  function addnewstaff(){
        $data=food::all();
        return view("admin2.addnewstaff", compact("data"));
    }

    public function uploadstaff(Request $request){
        $data2 = new staff;
    
        if ($request->hasFile('staffImage')) {
            $image = $request->file('staffImage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
    
            $destinationPath = public_path('staffimage'); 
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
    
            $image->move($destinationPath, $imagename);
            $data2->staffImage = $imagename;
        } else {
            return back()->with('error', 'Image upload failed');
        }
    
        $data2->staffName = $request->staffName;
        $data2->staffContactNo = $request->staffContactNo;
        $data2->staffEmail = $request->staffEmail;
        $data2->staffPosition = $request->staffPosition;
    
        $data2->save();

        $data = staff::all();

        return redirect()->route('viewstaff')->with('success', 'Staff item updated successfully');
        // return view("admin2.adminstaff", compact("data"));
    }

    public  function updatestaff($id){
        $data=staff::find($id);

        return view("admin2.updatestaff",compact("data"));
    }

    public function update2(Request $request, $id){
        $data2 = staff::find($id);
        
        if (!$data2) {
            return redirect()->back()->with('error', 'Food item not found');
        }

        // Handle image upload
        if ($request->hasFile('staffImage')) {
            $image = $request->file('staffImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('staffimage'), $imageName);
            $data2->staffImage = $imageName;
        }

        $data2->staffName = $request->staffName;
        $data2->staffContactNo = $request->staffContactNo;
        $data2->staffEmail = $request->staffEmail;
        $data2->staffPosition = $request->staffPosition;

        $data2->save();

        $data=staff::all();

        if (!$data) {
            $data = collect();  // Return empty collection if no data
        }

        return redirect()->route('viewstaff')->with('success', 'Staff item updated successfully');
        // return view("admin2.adminstaff",compact("data"));

    }

    public  function deletestaff($id){
        $data=staff::find($id);
        $data->delete();
        return redirect()->back();
    }





    public function viewreservation(){
        $data=reservation::all();

        return view("admin2.adminreservation", compact("data"));
    }

    public  function addnewreservation(){
        $data=reservation::all();
        return view("admin2.addnewreservation", compact("data"));
    }

    public function uploadreservation(Request $request){
        $data2 = new reservation;
    
        $data2->name = $request->name;
        $data2->email = $request->email;
        $data2->phone = $request->phone;
        $data2->guest = $request->guest;
        $data2->date = $request->date;
        $data2->time = $request->time;
        $data2->status = $request->status;
        $data2->message = $request->message;
    
        $data2->save();

        $data = reservation::all();

        return redirect()->route('viewreservation')->with('success', 'Reservation item updated successfully');
        
        // return view("admin2.adminreservation", compact("data"));
    }

    public  function updatereservation($id){
        $data=reservation::find($id);

        return view("admin2.updatereservation",compact("data"));
    }

    public function update3(Request $request, $id){
        $data2 = reservation::find($id);
        
        if (!$data2) {
            return redirect()->back()->with('error', 'Food item not found');
        }

        $data2->name = $request->name;
        $data2->email = $request->email;
        $data2->phone = $request->phone;
        $data2->guest = $request->guest;
        $data2->date = $request->date;
        $data2->time = $request->time;
        $data2->status = $request->status;
        $data2->message = $request->message;

        $data2->save();

        $data=reservation::all();

        if (!$data) {
            $data = collect();  // Return empty collection if no data
        }

        return redirect()->route('viewreservation')->with('success', 'Reservation item updated successfully');


        // return view("admin2.adminreservation",compact("data"));

    }

    public  function deletereservation($id){
        $data=reservation::find($id);
        $data->delete();
        return redirect()->back();
    }







    public function orders() {
        $data = DB::table('orders')
            ->leftJoin('payments', 'orders.id', '=', 'payments.order_id') // Join with payments
            ->select('orders.*', 'payments.status as payment_status', 'payments.id as payment_id') // Select needed fields
            ->get();
    
        $orderItems = DB::table('order_items')
            ->select('order_id', 'foodname', 'price', 'quantity') // Select order items details
            ->get()
            ->groupBy('order_id'); // Group by order_id to easily retrieve later
    
        return view('admin2.orders', compact('data', 'orderItems'));
    }

    public  function addneworder(){
        $user_id = Auth::id();

        $data=order::all();
        $data2=food::all();

        $data3 = cart::where('user_id', $user_id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        $data4 = cart::select('*')->where('user_id', '=', $user_id)->get();

        $cartItems = Cart::where('user_id', Auth::id())
            ->join('food', 'carts.food_id', '=', 'food.id')
            ->select('carts.*', 'food.image', 'food.title', 'food.price') // Add title and price
            ->get();


        return view("admin2.addneworder", compact("data", "data2", "data3", "data4", "cartItems"));


        // return view("admin2.addneworder", compact("data","data2"));
    }

    public function removeFromCart($id)
    {
        // Find the cart item by ID
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete(); // Remove item from cart
            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found.');
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

    public function uploadOrder(Request $request)
    {
        $order = new Order;

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->servicetype = $request->servicetype;
        $order->address = $request->address;
        $order->total_amount     = $request->total_amount;

        $order->save();

        $order_id = $order->id; // Get the ID of the newly created order

        // Save Order Items
        foreach ($request->foodname as $key => $foodname) {
            $orderItem = new OrderItem;
            $orderItem->order_id  = $order_id;  // Associate item with the order
            $orderItem->foodname  = $foodname;
            $orderItem->price     = $request->price[$key];
            $orderItem->quantity  = $request->quantity[$key];
    
            $orderItem->save();
        }
        

        // Save Payment Details
        $payment = new Payment;
        $payment->order_id = $order->id;
        $payment->paymentmethod = $request->paymentmethod;
        $payment->card_no = $request->card_no ?? null;
        $payment->exp = $request->exp ?? null;
        $payment->cvv = $request->cvv ?? null;

        // Handle proof of payment image upload
        if ($request->hasFile('proof')) {
            $image = $request->file('proof');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('proofimage'), $imageName);
            $data->proof = $imageName;
        }

        $payment->save();

        // dd($request->all());


        return redirect()->route('vieworder')->with('success', 'Order uploaded successfully.');
    }

    public function updateorder($id)
    {
        $order = Order::find($id);
        $orderItems = OrderItem::where('order_id', $id)->get(); // Get order items

        $data2=food::all();

        // $data3 = cart::where('user_id', $user_id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        // $data4 = cart::select('*')->where('user_id', '=', $user_id)->get();

        $cartItems = Cart::where('user_id', Auth::id())
            ->join('food', 'carts.food_id', '=', 'food.id')
            ->select('carts.*', 'food.image', 'food.title', 'food.price') // Add title and price
            ->get();

        return view("admin2.updateorder", compact("order", "orderItems", "data2"));
    }

    public function removeFromOrder($id)
    {
        // Find the cart item by ID
        $cartItem = OrderItem::find($id);
        

        if ($cartItem) {
            $cartItem->delete(); // Remove item from cart
            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found.');
    }

    public function update4(Request $request, $id)
    {
        $order = Order::find($id);
        
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        // Update order details
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->servicetype = $request->servicetype;
        $order->address = $request->address;
        $order->total_amount= $request->total_amount;
        $order->save();

        // Update order items if any
        if ($request->has('order_items')) {
            foreach ($request->order_items as $itemId => $itemData) {
                $orderItem = OrderItem::find($itemId);
                if ($orderItem) {
                    $orderItem->foodname = $itemData['foodname'];
                    $orderItem->quantity = $itemData['quantity'];
                    $orderItem->price = $itemData['price'];
                    $orderItem->save();
                }
            }
        }

        return redirect()->route('vieworder')->with('success', 'Order updated successfully');
    }

    public function deleteorder($id)
    {
        $order = Order::find($id);
    
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }
    
        // Delete related order items
        OrderItem::where('order_id', $id)->delete();
    
        // Delete related payment records
        Payment::where('order_id', $id)->delete();
    
        // Delete the order itself
        $order->delete();
    
        return redirect()->back()->with('success', 'Order deleted successfully');
    }
    

    // public function addtocart3 (Request $request, $id){
    //     if (Auth::id()){
            
    //         $user_id=Auth::id();
    //         $foodid=$id;
    //         $quantity=$request->quantity;

    //         // Check if the quantity is 0
    //         if ($quantity == 0) {
    //             // Flash an error message to the session
    //             return redirect()->back()->with('error', 'Quantity cannot be zero.');
    //         }

    //         $cart=new OrderItem;

            
    //         $cart->foodname  = $foodname;
    //         $cart->price     = $request->price[$key];
    //         $cart->quantity  = $request->quantity[$key];

    //         $cart->user_id=$user_id;
    //         $cart->food_id=$foodid;
    //         $cart->quantity=$quantity;

    //         $cart->save();

    //         return redirect()->back();
    //     } else {
    //         return redirect('/login');
    //     }
    // }




}
