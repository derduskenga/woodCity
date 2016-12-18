@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">

                    <div class="col-sm-5 col-sm-offset-1" id="socil-login">
                            <div>
                            <a class="btn btn-block btn-lg btn-social btn-facebook" href="{{ route('social.redirect', 'facebook') }}">
                                <span class="fa fa-facebook"></span>
                                Sign in with Facebook
                            </a>
                            </div>

                        <div>
                        <a class="btn btn-block btn-lg btn-social btn-twitter" href="{{ route('social.redirect', 'twitter') }}">
                            <span class="fa fa-twitter"></span>
                            Sign in with Twitter
                        </a>
                        </div>
                        <div>
                        <a class="btn btn-block btn-lg btn-social btn-google" href="{{ route('social.redirect', 'google') }}">
                            <span class="fa fa-google-plus"></span>
                            Sign in with Google+
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-5">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" placeholder="E-mail Address" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                 <button type="submit" class="btn btn-default btn-block btn-lg btn-social">
                                    <span class="fa fa-btn fa-sign-in"></span>
                                    Login with email
                                </button>
                                <br>
                                <a class="btn btn-link btn-block" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

