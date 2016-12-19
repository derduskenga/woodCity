@extends('layouts.app')

@section('style')

@endsection

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cart</div>
                <div class="panel-body">
                
                
                



                    {{ $product->name }}
                
                
                
        

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
