@extends('layout.publiclayout')
@section('content')
    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">
                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.html">@lang('public.nav-home')</a></li>
                        @foreach($cat_name as $cat)
                            <li class="active"><a href="{{ route('category.show', $cat->id) }}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                {{$cat->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>@lang('public.nav-category')</h5>
                        </div>
                        <ul class="sidebar_categories">
                            @foreach($categories as $menu)
                                <li>
                                    <a href="{{ route('category.show', $menu->id) }}">{!! $menu->name !!}</a>
                                    <span class="caret"></span>
                                    @include('errors.childItems')
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="main_content">
                    <div class="products_iso">
                        <div class="row">
                            <div class="col">
                                <div class="product-grid">
                                    @foreach($books as $book)
                                        <div class="product-item {{$book->category_id}}">
                                            <div class="product discount product_filter">
                                                <div class="product_image">
                                                    <a href="{{ route('detail.show', $book->id) }}">
                                                        <img class="mystyle1" src="/assets/images/{{$book->picture}}" >
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_name"><a href="{{ route('detail.show', $book->id) }}">{{$book->title}}</a></h6>
                                                </div>
                                            </div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="red_button add_to_cart_button"><a href="{{ route('detail.show', $book->id) }}">@lang('public.btn-borrow')</a></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
