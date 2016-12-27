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
                                    <h3>Products <button class="btn btn-default" data-toggle="modal" data-target="#add-product"><i class="fa fa-plus"></i> Product</button></h3>
                                    <hr>
                                </div>

                                <table class="table table-bordered table-striped table-hover table-responsive" id="products">
                                    <thead>
                                    <tr>

                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Published
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $product)
                                    <tr>

                                        <td>
                                            [image]
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.show', $product) }}">{{ $product->name }}</a>
                                        </td>
                                        <td>
                                            {{ $product->description }}
                                        </td>
                                        <td>
                                        {{ $product->price }}
                                        </td>
                                        <td>
                                            [published]
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $product) }}">Edit</a> - <a href="#">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'admin.product.store']) !!}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-6">
                                    {{ Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Name']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-sm-4 control-label">Description</label>
                                <div class="col-sm-6">
                                    {{ Form::text('description', '',['class' => 'form-control', 'placeholder' => 'Description']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Price</label>
                                <div class="col-sm-6">
                                    {{ Form::number('price', '',['class' => 'form-control', 'placeholder' => 'Price']) }}
                                </div>
                            </div>

                            {{--Add the selecting of category--}}


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

@section("script")
    $(document).ready(function() {
        $('#products').DataTable();
        $('#categories').multiselect();
    });

@endsection
