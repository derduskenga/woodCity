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
                                    <h3>Users <button class="btn btn-default" data-toggle="modal" data-target="#add-user"><i class="fa fa-plus"></i> User</button></h3>
                                    <hr>
                                </div>

                                <table class="table table-bordered table-striped table-hover table-responsive" id="users">
                                    <thead>
                                    <tr>

                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            email
                                        </th>
                                        <th>
                                            Roles
                                        </th>
                                        <th>
                                            Active
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                    <tr>

                                        <td>
                                            <a href="#">{{ $user->name }}</a>
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            <ul>
                                            @foreach($user->roles as $role)
                                                <li><a href="#">{{ $role->display_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                        <a href="#">{{ $user->activated }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}">Edit</a> - <a href="#">delete</a>
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
    <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'admin.user.store']) !!}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
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
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-6">
                                    {{ Form::email('email', '',['class' => 'form-control', 'placeholder' => 'user@example.com']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-6">
                                    {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-4 control-label">Role</label>
                                <div class="col-sm-6">
                                    {{ Form::select('roles[]', \App\Role::all()->lists('display_name', 'id'), '', ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'roles']) }}
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
    $('#roles').multiselect();
    } );

@endsection
