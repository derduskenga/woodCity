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

                                    the orders page


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
