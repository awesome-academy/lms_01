@extends('layout.publiclayout')
@section('content')
    <section id="cart_items">
        <div class="container product_section_container">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home')}}">@lang('public.nav-home')</a></li>
                    <li class="active">@lang('public.borrow-cart')</li>
                </ul>
                <div>
                    <span>
                        <a class="btn btn-default update" href="{{ url('/home')}}">
                            @lang('public.btn-back')
                        </a>
                    </span>
                    @include('errors.alert')
                </div>
            </div>
                <div class="table-responsive cart_info">
                    @if(Cart::count())
                        {!! Form::open(['method' => 'POST', 'route' => 'detail.store']) !!}
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image"></td>
                                    <td class="description">@lang('public.lb-description')</td>
                                    <td>@lang('public.lb-quantity')</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $item)
                                    <tr>
                                        <td class="cart_product">
                                            <a href=""><img class="mystyle1" src="/assets/images/{{$item->options->picture}}"></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="">{{ $item->name }}</a></h4>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a href="">{!! $item->qty !!}</a>
                                            </div>
                                        </td>
                                        <td class="cart_delete">
                                            {!! Form::open(['method' => 'POST', 'route' => 'cart.del']) !!}
                                                {!! Form::hidden('book_id', $item->id) !!}
                                                {!! Form::submit(trans('user.btn-del'), ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="form-group">
                                {!! Form::label('dayborrow', trans('public.lb-day-borrow'), ['class' => 'col-md-4 col-form-label']) !!}
                                {!! Form::date('dayborrow', \Carbon\Carbon::now(), ['class' => 'form-control ']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('endborrow', trans('public.lb-end-borrow'), ['class' => 'col-md-4 col-form-label']) !!}
                                {!! Form::date('endborrow', \Carbon\Carbon::now(), ['class' => 'form-control ']) !!}
                            </div>
                            {!! Form::submit(trans('public.checkout'), ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @else
                        <p>@lang('public.cart-empty')</p>
                    @endif
                </div>
        </div>
    </section>
@endsection
