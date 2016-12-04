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
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td>
                                            <a href="#">John Peter</a>
                                        </td>
                                        <td>
                                            peter@john.com
                                        </td>
                                        <td>
                                            Administrator
                                        </td>
                                        <td>
                                            <a href="#">Edit</a><a href="#">delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Wesonga Kamau</a>
                                        </td>
                                        <td>
                                            wesgona@gmail.com
                                        </td>
                                        <td>
                                            Coordinator
                                        </td>
                                        <td>
                                            <a href="#">Edit</a><a href="#">delete</a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <a href="#">Ernestine Wimberly</a>
                                        </td>
                                        <td>
                                            wimberly@yahoo.com
                                        </td>
                                        <td>
                                            Shipment
                                        </td>
                                        <td>
                                            <a href="#">Edit</a><a href="#">delete</a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <a href="#">August Forde</a>
                                        </td>
                                        <td>
                                            forde@hotmail.com
                                        </td>
                                        <td>
                                            Administrator
                                        </td>
                                        <td>
                                            <a href="#">Edit</a><a href="#">delete</a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <a href="#">Earleen Mattie</a>
                                        </td>
                                        <td>
                                            earleen@strathmore.edu
                                        </td>
                                        <td>
                                            Manager
                                        </td>
                                        <td>
                                            <a href="#">Edit</a><a href="#">delete</a>
                                        </td>
                                    </tr>
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
                <form action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-4 control-label">Role</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="role" id="role">
                                        <option value="1">Administrator</option>
                                        <option value="1">Manager</option>
                                        <option value="1">Coordinator</option>
                                        <option value="1">Finance</option>
                                    </select>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section("script")
    $(document).ready(function() {
    $('#users').DataTable();
    } );

@endsection
