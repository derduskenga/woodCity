@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Shop Home</div>

                <div class="panel-body">
                   
                   
                  
                  
                  
                   <div class="row">

                    @foreach($products as $product)

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">KES {{ $product->price }}</h4>
                                <h4><a href="{{ route('product.detail', $product) }}">{{ $product->name }}</a>
                                </h4>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                            <button class="btn btn-primary">Add To Cart</button>
                    <button class="btn btn-default">Add To Wishlist</button>
                        </div>
                    </div>
                    @endforeach

                    
                        </div>
                   
                   
                   
                   
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
