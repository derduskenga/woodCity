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
                                SIDE MENU
                                <ul>
                                    <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                    <li><a href="{{ route('client.orders') }}">Orders</a></li>
                                    <li><a href="#">Payments</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-9">

                                <div class="container row" style="max-width: 100%;">

                                    <h3>Your Orders</h3>
                                    
                                        <div class="menu">
                                          <div class="accordion">
                                        @foreach($orders as $order)
                                         <div class="accordion-group">
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" href="#order{{$order->id}}">Order #{{$order->id}} - {{$order->created_at}}</a>
                                              </div>
                                              <div id="order{{$order->id}}" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                  <table class="table table-striped table-condensed">
                                                    <thead>
                                                      <tr>
                                                      <th>
                                                      Title
                                                      </th>
                                                      <th>
                                                      Quantity
                                                      </th>
                                                      <th>
                                                      Price
                                                      </th>
                                                      <th>
                                                      Total
                                                      </th>
                                                      </tr>
                                                    </thead>   
                                                    <tbody>
                                                    @foreach($order->orderItems as $orderitem)
                                                      <tr>
                                                        <td>{{$orderitem->name}}</td>
                                                        <td>{{$orderitem->pivot->quantity}}</td>
                                                        <td>{{$orderitem->price}}</td>
                                                        <td>{{$orderitem->pivot->total}}</td>
                                                      </tr>
                                                    @endforeach
                                                      <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>Total</b></td>
                                                        <td><b>{{$order->total}}</b></td>
                                                      </tr>
                                                      <tr>
                                                        <td><b>Shipping Address</b></td>
                                                        <td>
                                                            <dl class="">
                                                                <dt>
                                                                    {{ $order->address->city }}</dt>
                                                                <dd>
                                                                    {{ $order->address->address1 }} <br> {{ $order->address->address2 }} <br> {{ $order->address->province }} <br> {{ $order->address->country }}
                                                                </dd>
                                                            </dl>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                        @endforeach
                                        </div>


                                </div>




                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'admin.role.store']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Role</h4>
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
                                <label for="role" class="col-sm-4 control-label">Permissions</label>
                                <div class="col-sm-6">
                                        {{ Form::select('permissions[]', \App\Permission::lists('display_name', 'id')->all(), '', ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'permissions']) }}


                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

@section("script")
    $(document).ready(function() {
    $('#users').DataTable();
    $('#permissions').multiselect();
    } );


@endsection
