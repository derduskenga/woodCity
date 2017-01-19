<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use View;

use Redirect;
use App\Cart;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: might save the client object in the session

        $client = Auth::user()->client;
    
         $orders= $client->orders;
         
         
        
        
        return View::make('modules.client.order.index')
              ->with('orders', $orders);
 

        // return view('modules.client.order.index', ['client', $client]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         {
    $rules=array(

      'address'=>'required'
    );

  $validator = Validator::make($request->all(), $rules);

      if ($validator->fails())
      {
          return redirect()->back()->with('error','Address field is required!');
      }

      $client = Auth::user()->client;
      $address = $request->input('address');

       $cart_products = $client->cart;
       
       $cart_total = $cart_products->sum('total');

       if(!$cart_products){

         return redirect()->back()->with('error','Your cart is empty.');
       }

      $order = Order::create(
        array(
        'client_id'=>$client->id,
        'address_id'=>$address,
        'total'=>$cart_total
        ));

      foreach ($cart_products as $order_products) {

        $order->orderItems()->attach($order_products->product_id, array(
          'quantity'=>$order_products->quantity,
          'price'=>$order_products->products->price,
          'total'=> abs($order_products->products->price * $order_products->quantity)
          ));

      }
      
      Cart::where('client_id','=',$client->id)->delete();

      return Redirect::route('cart.index')->with('message','Your order processed successfully.');

    }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
