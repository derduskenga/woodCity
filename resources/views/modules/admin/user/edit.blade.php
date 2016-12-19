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
                                    <h3>Edit: {{ $user->name }}</h3>
                                    <hr>

                                    {!! Form::model($user, ['route' => ['admin.user.update', $user], 'method' => 'PUT']) !!}




                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Name</label>
                                            <div class="col-sm-6">
                                                {{ Form::text('name', $user->name,['class' => 'form-control', 'placeholder' => 'Name']) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-6">
                                                {{ Form::email('email', $user->email,['class' => 'form-control', 'placeholder' => 'user@example.com']) }}
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

                                                {{ Form::select('roles[]', $roles, $selected_roles, ['class' => 'form-control', 'multiple' => 'multiple' , 'id' => 'roles']) }}


                                            </div>
                                        </div>

{{ $selected_roles }}
                                    </div>



                                    <button type="submit" class="btn btn-primary">Add User</button>

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
