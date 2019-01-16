<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>@lang('admin.title')</title>
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
        {{ Html::style(asset('js/lib/bootstrap/css/bootstrap.min.css')) }}
        {{ Html::style(asset('js/lib/font-awesome/css/font-awesome.css')) }}
        {{ Html::style(asset('css/zabuto_calendar.css')) }}
        {{ Html::style(asset('lib/gritter/css/jquery.gritter.css')) }}
        {{ Html::style(asset('css/style.css')) }}
        {{ Html::style(asset('css/style-responsive.css')) }}
        {{ Html::script(asset('js/lib/chart-master/Chart.js')) }}
    </head>
    <body>
    <section id="container">
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="index.html" class="logo"><b>@lang('admin.logo')</b></a>

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{route('login.create')}}">@lang('admin.logout-link')</a></li>
                </ul>
            </div>
        </header>
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                    <h5 class="centered">{{Auth::user()->name}}</h5>
                    <li class="mt">
                        <a class="active" href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>@lang('admin.dashboard')</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('admin.menu-table')</span>
                        </a>
                        <ul class="sub">
                            <li><a href="/">@lang('admin.sub-category')</a></li>
                            <li><a href="/">@lang('admin.sub-book')</a></li>
                            <li><a href="/">@lang('admin.sub-author')</a></li>
                            <li><a href="/">@lang('admin.sub-publisher')</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>@lang('admin.menu-user')</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-comments"></i>
                            <span>@lang('admin.menu-comment')</span>
                        </a>
                    </li>
                    <li>
                        <a href="google_maps.html">
                            <i class="fa fa-map-marker"></i>
                            <span>@lang('admin.google-map')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
        </section>
        <footer class="site-footer">
            <div class="text-center">
                <p>
                    &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
                </p>
                <div class="credits">
                    Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
                </div>
                <a href="index.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
    </section>
    {{ Html::script(asset('js/lib/jquery/jquery.min.js')) }}
    {{ Html::script(asset('js/lib/bootstrap/js/bootstrap.min.js')) }}
    {{ Html::script(asset('js/lib/jquery.scrollTo.min.js')) }}
    {{ Html::script(asset('js/lib/jquery.nicescroll.js')) }}
    {{ Html::script(asset('js/lib/jquery.sparkline.js')) }}
    {{ Html::script(asset('/js/lib/jquery.dcjqaccordion.2.7.js')) }}
    {{ Html::script(asset('js/lib/common-scripts.js')) }}
    {{ Html::script(asset('js/lib/gritter/js/jquery.gritter.js')) }}
    {{ Html::style(asset('js/lib/gritter/css/jquery.gritter.css')) }}
    {{ Html::script(asset('js/lib/gritter-conf.js')) }}
    {{ Html::script(asset('js/lib/sparkline-chart.js')) }}
    {{ Html::script(asset('js/lib/zabuto_calendar.js')) }}
    {{ Html::script(asset('js/ajax/welcome.js')) }}
    {{ Html::script(asset('js/ajax/edituser.js')) }}
    </body>
</html>
