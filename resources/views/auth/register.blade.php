@extends('layouts.auth')

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/theme/default/assets/js/pages/login.js') }}"></script>
@endsection
@section('content')

    <!-- Main content -->
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Registration form -->
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="panel registration-form">
                            <div class="panel-body">
                                <div class="text-center">
                                    <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                    <h5 class="content-group-lg">{{ __('common.create_account') }} <small class="display-block">{{ __('common.all_fields_are_required') }}</small></h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} has-feedback">
                                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="{{ __('common.first_name') }}">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                            @if ($errors->has('first_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }} has-feedback">
                                            <input type="text" class="form-control" name="second_name" value="{{ old('second_name') }}" required placeholder="{{ __('common.second_name') }}">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                            @if ($errors->has('second_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('second_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus placeholder="{{ __('common.choose_username') }}">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-plus text-muted"></i>
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="{{ __('auth.email_address') }}">
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-muted"></i>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                                            <input type="password" class="form-control" name="password" required placeholder="{{ __('auth.password') }}">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('auth.confirm_password') }}">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /registration form -->


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
                {{--<div class="panel-heading">{{ __('common.register') }}</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">{{ __('common.name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">{{ __('auth.email_address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

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
                            {{--<label for="password-confirm" class="col-md-4 control-label">{{ __('auth.confirm_password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('common.register') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
