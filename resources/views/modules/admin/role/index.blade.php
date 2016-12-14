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
                                    <h3>Roles <button class="btn btn-default" data-toggle="modal" data-target="#add-role"><i class="fa fa-plus"></i> Role</button></h3>
                                    <hr>
                                </div>

                                <table class="table table-bordered table-striped table-hover table-responsive" id="users">
                                    <thead>
                                    <tr>

                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Permissions
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            {{ $role->display_name }}
                                        </td>
                                        <td>
                                            {{ $role->description }}
                                        </td>
                                        <td>
                                            <ul>
                                            @foreach($role->perms as $permission)
                                                <li><a href="#">{{ $permission->display_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.role.edit', ['id' => $role->id]) }}">Edit</a> - <a href="#">delete</a>
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
