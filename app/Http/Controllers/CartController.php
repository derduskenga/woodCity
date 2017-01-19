<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use Auth;
use App\Cart;
use App\Product;
use View;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //
public function postAddToCart(Request $request)
  {
    $rules=array(

      'quantity'=>'required|numeric',
      'product_id'=>'required|numeric|exists:products,id'
    );

    $validator = Validator::make($request->only(['product_id', 'quantity']), $rules);

      if ($validator->fails())
      {
          return redirect()->back()->with('error','The book could not added to your cart!');
      }

      // $client_id = Client::where('user_id', Auth::id())->first();
      $client_id = Client::where('user_id',"=", Auth::id())->first()->id;
      $product_id = $request->input('product_id');
      $quantity = $request->input('quantity');

      $product = Product::find($product_id);
      $total = abs($quantity * $product->price);

       $count = Cart::where('product_id','=',$product_id)->where('client_id','=',$client_id)->count();

       if($count){

         return redirect()->back()->with('error','The product already in your cart.');
       }

      Cart::create(
        array(
        'client_id'=>$client_id,
        'product_id'=>$product_id,
        'quantity'=>$quantity,
        'total'=>$total
        ));
        
        // $cart = Cart::where('client_id', $client_id)->get();

      // return view('shop.cart');
      
      return redirect()->route('cart.index');
  }


  public function getIndex(){
      
      // TODO: get to save the client id in the sessions

    $client_id = Client::where('user_id', Auth::id())->first()->id;

    $cart_products=Cart::with('products')->where('client_id','=',$client_id)->get();

    $cart_total=Cart::with('products')->where('client_id','=',$client_id)->sum('total');

    if(!$cart_products){

      return redirect()->back()->with('error','Your cart is empty');
    }
    
    return View::make('shop.cart')
          ->with('cart_products', $cart_products)
          ->with('cart_total',$cart_total);
  }

  public function getDelete($id){

    $cart = Cart::find($id)->delete();

    return redirect()->back();
  }
  
  
}
