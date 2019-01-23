<!DOCTYPE html>
<html lang="en">
<head>
    <title>@lang('public.title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{ Html::style(asset('assets/styles/bootstrap4/bootstrap.min.css')) }}
    {{ Html::style(asset('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')) }}
    {{ Html::style(asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')) }}
    {{ Html::style(asset('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')) }}
    {{ Html::style(asset('assets/plugins/OwlCarousel2-2.2.1/animate.css')) }}
    {{ Html::style(asset('assets/styles/main_styles.css')) }}
    {{ Html::style(asset('assets/styles/searchstyle.css')) }}
    {{ Html::style(asset('assets/styles/responsive.css')) }}
    {{ Html::style(asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')) }}
    {{ Html::style(asset('assets/styles/categories_styles.css')) }}
    {{ Html::style(asset('assets/styles/categories_responsive.css')) }}
    {{ Html::style(asset('assets/plugins/themify-icons/themify-icons.css')) }}
    {{ Html::style(asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')) }}
    {{ Html::style(asset('assets/styles/single_styles.css')) }}
    {{ Html::style(asset('assets/styles/single_responsive.css')) }}
    {{ Html::style(asset('css/mystyle.css')) }}
</head>

<body>

<div class="super_container">
    <header class="header trans_300">
        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_nav_left">@lang('public.top-nav-left')</div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">
                                <li class="language">
                                    <a href="#">
                                        @lang('public.language')
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="language_selection">
                                        <li><a href="/locale/vi">@lang('public.vietnam')</a></li>
                                        <li><a href="/locale/en">@lang('public.english')</a></li>
                                    </ul>
                                </li>
                                <li class="account">
                                    <a href="#">
                                        @lang('public.account')
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        @if(Auth::check())
                                            <li><a href="#"><i class="fa fa-user"></i>{{ Auth::user()->name }} </a></li>
                                            <li><a href="{{ route('follow.index') }}"><i class="fa fa-address-book-o" aria-hidden="true"></i>@lang('public.book-follow')</a></li>
                                            <li><a href="{{ route('login.create') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>@lang('public.logout')</a></li>
                                        @else
                                            <li><a href="{{ route('login.index') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>@lang('public.login')</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="/home">@lang('public.logo')</a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="/home">@lang('public.nav-home')</a></li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('public.nav-category')
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $menu)
                                            <li>
                                                <a href="{{ route('category.show', $menu->id) }}">{!! $menu->name !!}</a>
                                                <span class="caret"></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">@lang('public.nav-author')</a></li>
                                <li><a href="#">@lang('public.nav-blog')</a></li>
                                <li><a href="contact.html">@lang('public.nav-contact')</a></li>
                            </ul>
                            <ul class="navbar_user">
                                <li>
                                    {!! Form::open(['method' => 'POST', 'route' =>'home.store', 'class' => 'searchbar']) !!}
                                        <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
                                        {!! Form::text('search', '', ['class' => 'search_input', 'placeholder' => trans('public.search-bar')]) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                            <ul class="navbar_user">
                                <li class="checkout">
                                    <a href="{!! route('cart.create') !!}">
                                        @if (Cart::count() != config('setting.default'))
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="checkout_items" class="checkout_items">{!! Cart::count() !!}</span>
                                        @else
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    @yield('content')

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>@lang('public.free-ship')</h6>
                            <p>@lang('public.free-ship-content')</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>@lang('public.delivery')</h6>
                            <p>@lang('public.delivery-content')</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>@lang('public.return')</h6>
                            <p>@lang('public.return-content')</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>@lang('public.open')</h6>
                            <p>@lang('public.open-content')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title">
                        <h2>@lang('public.last-blog')</h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(/assets/images/blog_1.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">@lang('public.blog-title')</h4>
                            <span class="blog_meta">@lang('public.blog-meta')</span>
                            <a class="blog_more" href="#">@lang('public.blog-more')</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(/assets/images/blog_2.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">@lang('public.blog-title')</h4>
                            <span class="blog_meta">@lang('public.blog-meta')</span>
                            <a class="blog_more" href="#">@lang('public.blog-more')</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(/assets/images/blog_3.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">@lang('public.blog-title')</h4>
                            <span class="blog_meta">@lang('public.blog-meta')</span>
                            <a class="blog_more" href="#">@lang('public.blog-more')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>@lang('public.news-letter')</h4>
                        <p>@lang('public.letter-content')</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_nav_container">
                        <div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

{{ Html::script(asset('assets/js/jquery-3.2.1.min.js')) }}
{{ Html::script(asset('assets/styles/bootstrap4/popper.js')) }}
{{ Html::script(asset('assets/styles/bootstrap4/bootstrap.min.js')) }}
{{ Html::script(asset('assets/plugins/Isotope/isotope.pkgd.min.js')) }}
{{ Html::script(asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')) }}
{{ Html::script(asset('assets/plugins/easing/easing.js')) }}
{{ Html::script(asset('assets/js/custom.js')) }}
{{ Html::script(asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')) }}
{{ Html::script(asset('assets/js/categories_custom.js')) }}
{{ Html::script(asset('assets/js/single_custom.js')) }}
{{ Html::script(asset('js/ajax/publicScript.js')) }}

</body>

</html>
