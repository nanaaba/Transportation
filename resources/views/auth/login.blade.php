@extends('layouts.login')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1">
            <!--                        <img src="app-assets/images/logo/stack-logo-dark.png" alt="branding logo">-->
                                    Transportation
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Admin Login </span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <div style="display: none" class="alert alert-danger" id="response"></div>

                                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" class="form-control form-control-lg input-lg" name="_token" value="<?php echo csrf_token() ?>" />

                                    <fieldset class="form-group position-relative has-icon-left mb-0 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control form-control-lg input-lg" name="email" value="{{ old('email') }}" required autofocus>

                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" class="form-control form-control-lg input-lg" name="password"  placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember-me" class="chk-remember">
                                                <label for="remember-me"> Remember Me</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"/>
                                    <i class="ft-unlock"></i> Login</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


@endsection
