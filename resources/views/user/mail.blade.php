<h4>@lang('public.hello-mail')</h4>
<a>{{ Auth::user()->name }}</a>
<p>@lang('public.mail-content')</p>
<table class="table table-condensed">
    <thead>
    <tr class="cart_menu">
        <td class="description">@lang('public.lb-description')</td>
        <td></td>
        <td>@lang('public.lb-quantity')</td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    @foreach(Cart::content() as $item)
        <tr>
            <td class="cart_description">
                <h4><a href="">{{ $item->name }}</a></h4>
            </td>
            <td></td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <a href="">{!! $item->qty !!}</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<h3>@lang('public.admin-said')</h3>
