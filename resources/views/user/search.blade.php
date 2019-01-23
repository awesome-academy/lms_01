@extends('layout.publiclayout')

@section('content')
    <div class="main_slider" style="background-image:url(/assets/images/slider_2.jpg)">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>@lang('public.slider-content-h6')</h6>
                        <h1>@lang('public.slider-content-h1')</h1>
                        <div class="red_button shop_now_button"><a href="#">@lang('public.slider-button')</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(/assets/images/book_banner.jpeg)">
                        <div class="banner_category">
                            <a href="{{ route('category.show','1') }}">@lang('public.category-book')</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(/assets/images/author-background.jpg)">
                        <div class="banner_category">
                            <a href="{{ route('category.show','1') }}">@lang('public.category-author')</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(/assets/images/publisher.jpg)">
                        <div class="banner_category">
                            <a href="{{ route('category.show','1') }}">@lang('public.category-publisher')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>@lang('public.new-book')</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">@lang('public.all')</li>
                            @foreach($cats as $cat)
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".{{$cat->id}}">{{$cat->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                        @foreach($getSearch as $book)
                            <div class="product-item {{$book->category_id}}">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <a href="{{ route('detail.show', $book->id) }}">
                                            <img class="mystyle" src="/assets/images/{{$book->picture}}" >
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
@endsection
