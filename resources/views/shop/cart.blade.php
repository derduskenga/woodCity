@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cart</div>
                <div class="panel-body">
                
                


        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    <!--{{ $cart_products }}-->
                    @foreach($cart_products as $product)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="{{ route('product.detail', $product->product_id) }}">{{ $product->products->name }}</a></h4>
                                <h5 class="media-heading"> by <a href="#">###Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>###In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" id="exampleInputEmail1" value="{{ $product->quantity }}">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{ $product->products->price }}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{ $product->total }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="{{ route('cart.delete', $product->product_id) }}" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                    </tr>
                    
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal<br>Estimated shipping</h5><h3>Total</h3></td>
                        <td class="text-right"><h5><strong>$24.59###<br>$6.94###</strong></h5><h3>${{ $cart_total }}</h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                            <a type="button" class="btn btn-success" href="{{ route('checkout') }}">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

                
                
                
                
                
                
                
                
                
                

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
