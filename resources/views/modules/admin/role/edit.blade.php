@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Role</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                @include("modules.partials.home-side-menu", ["some" => "date"])
                            </div>
                            <div class="col-sm-9">

                                <div class="container row" style="max-width: 100%;">
                                    <h3>Edit: {{ $role->display_name }}</h3>
                                    <hr>
                                    {!! Form::model($role, ['route' => ['admin.role.update', $role]]) !!}


                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-4 control-label">Name</label>
                                                <div class="col-sm-6">
                                                    {{ Form::text('name', $role->display_name,['class' => 'form-control', 'placeholder' => 'Name']) }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="col-sm-4 control-label">Description</label>
                                                <div class="col-sm-6">
                                                    {{ Form::text('description', $role->description,['class' => 'form-control', 'placeholder' => 'Description']) }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="permissions" class="col-sm-4 control-label">Permissions</label>
                                                <div class="col-sm-6">
                                                    {{ Form::select('permissions[]', $permissions, $selected_permissions, ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'permissions']) }}
                                                    {{ $selected_permissions }}
                                                </div>
                                            </div>


                                        </div>



                                        <button type="submit" class="btn btn-primary">Add Role</button>

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
    $('#permissions').multiselect();
    } );


@endsection
