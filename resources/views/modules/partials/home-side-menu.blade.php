<?php
/**
 * Created by PhpStorm.
 * User: heri
 * Date: 04/12/16
 * Time: 13:13
 */ ?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    Products
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
                    <li role="presentation" class="{{ (\Request::route()->getName() == 'admin.product.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.product.index') }}">Product</a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#">##Categories</a>
                    </li>
                    <li role="presentation">
                        <a href="#">##Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-sliders" aria-hidden="true"></i> Management
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
                    <li role="presentation" class="{{ (\Request::route()->getName() == 'admin.user.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.user.index') }}">Users</a>
                    </li>
                    <li role="presentation" class="{{ (\Request::route()->getName() == 'admin.role.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.role.index') }}">Roles</a>
                    </li>
                    <li role="presentation">
                        <a href="#">##Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Orders
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active">
                        <a href="#">##Orders</a>
                    </li>
                    <li role="presentation">
                        <a href="#">##Pending</a>
                    </li>
                    <li role="presentation">
                        <a href="#">##Completed</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
