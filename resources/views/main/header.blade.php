<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand px-demo-brand" href="index.html"><span class="px-demo-logo bg-primary"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span><strong>Enrolment</strong></a>
        {{--<a class="navbar-brand" href="index.html"><img src="{{ asset('assets/theme/default/assets/images/logo_light.png') }}" alt=""></a>--}}

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        @if (Route::has('login'))
            @auth
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
            @endauth
        @endif
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">

                    @if(app()->getLocale() == 'en')
                        <img src="{{ asset('assets/theme/default/assets/images/flags/gb.png') }}" class="position-left" alt=""> {{ __('common.English') }}
                    @else
                        <img src="{{ asset('assets/theme/default/assets/images/flags/jo.png') }}" class="position-left" alt=""> {{ __('common.Arabic') }}
                    @endif

                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="lang" id="ar"><img src="{{ asset('assets/theme/default/assets/images/flags/jo.png') }}" alt=""> {{ __('common.Arabic') }}</a></li>
                    <li><a class="lang" id="en"><img src="{{ asset('assets/theme/default/assets/images/flags/gb.png') }}" alt=""> {{ __('common.English') }}</a></li>
                </ul>
            </li>
            <li><a href="/cart"><span class="px-navbar-label label label-danger" id="cart-items"></span><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            @guest
                <li><a href="{{ route('login') }}">{{ __('common.login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('common.register') }}</a></li>
            @else
                <li><a href="/home">{{ __('common.home') }}</a></li>
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ !is_null(Auth::user()->imgUrls)? Auth::user()->imgUrls :asset("system_images/no_photo.png") }}" alt="">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                        <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>
                                {{ __('common.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--<i class="icon-bubbles4"></i>--}}
                    {{--<span class="visible-xs-inline-block position-right">Messages</span>--}}
                    {{--<span class="badge bg-warning-400">2</span>--}}
                {{--</a>--}}

                {{--<div class="dropdown-menu dropdown-content width-350">--}}
                    {{--<div class="dropdown-content-heading">--}}
                        {{--Messages--}}
                        {{--<ul class="icons-list">--}}
                            {{--<li><a href="#"><i class="icon-compose"></i></a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                    {{--<ul class="media-list dropdown-content-body">--}}
                        {{--<li class="media">--}}
                            {{--<div class="media-left">--}}
                                {{--<img src="{{ asset('assets/theme/default/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt="">--}}
                                {{--<span class="badge bg-danger-400 media-badge">5</span>--}}
                            {{--</div>--}}

                            {{--<div class="media-body">--}}
                                {{--<a href="#" class="media-heading">--}}
                                    {{--<span class="text-semibold">James Alexander</span>--}}
                                    {{--<span class="media-annotation pull-right">04:58</span>--}}
                                {{--</a>--}}

                                {{--<span class="text-muted">who knows, maybe that would be the best thing for me...</span>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<li class="media">--}}
                            {{--<div class="media-left">--}}
                                {{--<img src="{{ asset('assets/theme/default/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt="">--}}
                                {{--<span class="badge bg-danger-400 media-badge">4</span>--}}
                            {{--</div>--}}

                            {{--<div class="media-body">--}}
                                {{--<a href="#" class="media-heading">--}}
                                    {{--<span class="text-semibold">Margo Baker</span>--}}
                                    {{--<span class="media-annotation pull-right">12:16</span>--}}
                                {{--</a>--}}

                                {{--<span class="text-muted">That was something he was unable to do because...</span>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<li class="media">--}}
                            {{--<div class="media-left"><img src="{{ asset('assets/theme/default/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>--}}
                            {{--<div class="media-body">--}}
                                {{--<a href="#" class="media-heading">--}}
                                    {{--<span class="text-semibold">Jeremy Victorino</span>--}}
                                    {{--<span class="media-annotation pull-right">22:48</span>--}}
                                {{--</a>--}}

                                {{--<span class="text-muted">But that would be extremely strained and suspicious...</span>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<li class="media">--}}
                            {{--<div class="media-left"><img src="{{ asset('assets/theme/default/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>--}}
                            {{--<div class="media-body">--}}
                                {{--<a href="#" class="media-heading">--}}
                                    {{--<span class="text-semibold">Beatrix Diaz</span>--}}
                                    {{--<span class="media-annotation pull-right">Tue</span>--}}
                                {{--</a>--}}

                                {{--<span class="text-muted">What a strenuous career it is that I've chosen...</span>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<li class="media">--}}
                            {{--<div class="media-left"><img src="{{ asset('assets/theme/default/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>--}}
                            {{--<div class="media-body">--}}
                                {{--<a href="#" class="media-heading">--}}
                                    {{--<span class="text-semibold">Richard Vango</span>--}}
                                    {{--<span class="media-annotation pull-right">Mon</span>--}}
                                {{--</a>--}}

                                {{--<span class="text-muted">Other travelling salesmen live a life of luxury...</span>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}

                    {{--<div class="dropdown-content-footer">--}}
                        {{--<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}

        </ul>
    </div>
</div>
<!-- /main navbar -->