@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                @include("modules.partials.home-side-menu", ["some" => "date"])
                            </div>
                            <div class="col-sm-9">

                                <div class="container row" style="max-width: 100%;">
                                    <h3>Edit: {{ $product->name }}</h3>
                                    <hr>

                                    {!! Form::model($product, ['route' => ['admin.product.update', $product], 'method' => 'PUT']) !!}


                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-4 control-label">Name</label>
                                                <div class="col-sm-6">
                                                    {{ Form::text('name', $product->name,['class' => 'form-control', 'placeholder' => 'Name']) }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="col-sm-4 control-label">Description</label>
                                                <div class="col-sm-6">
                                                    {{ Form::text('description', $product->description,['class' => 'form-control', 'placeholder' => 'Description']) }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="col-sm-4 control-label">Price</label>
                                                <div class="col-sm-6">
                                                    {{ Form::number('price', $product->price,['class' => 'form-control', 'placeholder' => 'Price']) }}
                                                </div>
                                            </div>

                                            {{--Add the selecting of category--}}


                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                    {!! Form::close() !!}



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("script")
    $(document).ready(function() {
    $('#roles').multiselect();
    } );

@endsection
