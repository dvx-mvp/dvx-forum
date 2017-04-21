@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body" style="padding-top: 30px;">
                    <form class="form-horizontal" role="form" method="POST" action="login">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Username') ? ' has-error' : '' }}" style="margin-bottom: 8px;">
                            <label for="Username" class="col-md-4 control-label input-sm">Username</label>

                            <div class="col-sm-7">
                                <input id="Username" type="text" class="form-control input-sm" name="Username" value="{{ old('Username') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Password') ? ' has-error' : '' }}" style="margin-bottom: 3px;">
                            <label for="Password" class="col-sm-4 control-label input-sm">Password</label>

                            <div class="col-sm-7">
                                <input id="Password" type="password" class="form-control input-sm" name="Password" required>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 3px;">
                            <div class="col-sm-6 col-sm-offset-4">
                                <div class="checkbox input-sm">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group-sm">

                            <div class="col-sm-7 col-sm-offset-4" style="margin-right: 0px; padding: 0px 0px 0px 5px;">
                                <button type="submit" class="btn btn-primary btn-sm col-sm-6">
                                    Login
                                </button>
                                <button type="reset" class="btn btn-default btn-sm col-sm-6">
                                    Reset
                                </button>
                            </div>


                            <div class="btn-group col-sm-6 col-sm-offset-4">
                            <a class="btn btn-link btn-sm" href="password.request">
                                Forgot Your Password?
                            </a>
                            </div>
                        </div>

                        @if ($errors->has('Username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Username') }}</strong>
                            </span>
                        @elseif($errors->has('Password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Password') }}</strong>
                            </span>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
