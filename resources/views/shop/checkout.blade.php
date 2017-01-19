@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cart</div>
                <div class="panel-body">
                
                    <h1>Checkout Page</h1>
                    <div class="row">
                        <div class="col-md-4">
                            
                            <h5>###Add an option to add address</h5>
                            
                            {!! Form::open(['route' => 'order.add']) !!}
                                <dl class="">
                                    @foreach($client->addresses as $address)
                                    
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="address" id="address" value="{{ $address->id }}">
                                        <dt>
                                            {{ $address->city }}</dt>
                                        <dd>
                                            {{ $address->address1 }} <br> {{ $address->address2 }} <br> {{ $address->province }} <br> {{ $address->country }}
                                        </dd>
                                      </label>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-block btn-success btn-large">
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Place order
                                    </button>
                                @endforeach
                            </dl>
                             {!! Form::close() !!}  
                            
                        </div>
                        <div class="col-md-8">
                            
                            <div class="panel panel-primary ">
                                <div class="panel-heading">
                                    Cart Summary  ##link
                                </div>
                                <div class="panel-body">
                                    
                                    <table class="table table-hover">
                                        <tbody>
                                    @foreach($client->client->cart as $product)
                                        <tr>
                                            <td>[IMAGE]</td>
                                            <td class="">{{ $product->products->name }} <b>X{{ $product->quantity }}</b></td>
                                            <td class=""><strong>${{ $product->total }}</strong></td>
                                            
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        
                                    <tfoot>
                                        <tr>
                                            <td>   </td>
                                            <td>   </td>
                                            <td><h5>Subtotal<br>Estimated shipping</h5><h3>Total</h3></td>
                                            <td class="text-right"><h5><strong>$24.59###<br>$6.94###</strong></h5><h3>${{ $client->client->cart()->sum('total') }}</h3></td>
                                        </tr>
                            
                                    </tfoot>
                                </table>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-8">Paymement option</div>
                    </div>        
        
                
                
                

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
