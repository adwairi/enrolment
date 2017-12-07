@extends('layouts.auth')

@section('content')

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Simple login form -->
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

                <div class="panel panel-body login-form">
                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group">{{ __('common.login_to_your_account') }} <small class="display-block">{{ __('common.enter_your_credentials_below') }}</small></h5>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback has-feedback-left">
                        <input id="email" type="email" name="email" class="form-control" placeholder="{{ __('auth.email_address') }}">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback has-feedback-left">
                        <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('auth.password') }}">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('common.login') }} <i class="icon-circle-right2 position-right"></i></button>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('password.request') }}">{{ __('auth.forgot_your_password?') }}</a>
                    </div>
                </div>
            </form>
            <!-- /simple login form -->


            <!-- Footer -->
            <div class="footer text-muted text-center">
                &copy; 2017. <a href="#">Enrolment</a>
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">{{ __('common.login') }}</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">{{ __('auth.email_address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">{{ __('auth.password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ __('auth.remember_me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-8 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('common.login') }}--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--{{ __('auth.forgot_your_password?') }}--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
