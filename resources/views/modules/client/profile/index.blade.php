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

                                    @if(empty($client))
                                        <div class="alert alert-warning" role="alert"><b>Create Profile</b> - Need to create a profile to make a purchase</div>
                                    @endif
                                        <h4>Profile Information</h4>

                                        {!! Form::model($client, ['route' => ['client.profile.update']]) !!}


                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label for="f_name" class="col-sm-4 control-label">First Name</label>
                                                <div class="col-sm-6">
                                                    {{ Form::text('f_name', $client ? $client->f_name : '',['class' => 'form-control', 'placeholder' => 'First Name']) }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="l_name" class="col-sm-4 control-label">Last Name</label>
                                                <div class="col-sm-6">
                                                    {{ Form::text('l_name', $client ? $client->l_name : '',['class' => 'form-control', 'placeholder' => 'Last Name']) }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone_no" class="col-sm-4 control-label">Phone Number</label>
                                                <div class="col-sm-6">
                                                    {{ Form::text('phone_no', $client ? $client->phone_no : '',['class' => 'form-control', 'placeholder' => 'Phone Number']) }}
                                                </div>
                                            </div>


                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>


                                </div>


                                        {!! Form::close() !!}


                                <hr>
                                <h4>Delevery Addresses</h4>

                                {!! Form::open(['route' => ['client.address.add']]) !!}

                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="address1" class="col-sm-4 control-label">Address 1</label>
                                        <div class="col-sm-6">
                                            {{ Form::text('address1','',['class' => 'form-control', 'placeholder' => 'Address 1']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address2" class="col-sm-4 control-label">Address 2</label>
                                        <div class="col-sm-6">
                                            {{ Form::text('address2','',['class' => 'form-control', 'placeholder' => 'Address 2']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="city" class="col-sm-4 control-label">City</label>
                                        <div class="col-sm-6">
                                            {{ Form::text('city','',['class' => 'form-control', 'placeholder' => 'City']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="province" class="col-sm-4 control-label">Province</label>
                                        <div class="col-sm-6">
                                            {{ Form::text('province','',['class' => 'form-control', 'placeholder' => 'Province']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class="col-sm-4 control-label">Country</label>
                                        <div class="col-sm-6">
                                            {{ Form::text('country','',['class' => 'form-control', 'placeholder' => 'Country']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Add Address</button>
                                        </div>
                                    </div>


                                </div>

                                {!! Form::close() !!}

                                <hr>
                                <table class="table table-bordered table-bordered">
                                    <thead>
                                    <tr>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Auth::user()->addresses as $address)
                                        <tr>
                                        <td>{{ $address->city }}</td>
                                        <td>
                                            {{ $address->address1 }} <br> {{ $address->address2 }} <br> {{ $address->province }} <br> {{ $address->country }}
                                        </td>
                                        <td><a href="#">Edit</a> - <a href="#">Delete</a></td>
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
