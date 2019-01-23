@if(array_key_exists($book_id, $followBook))
    <span id="wordD{{$book_id}}" >
        <div class="product_favorite d-flex flex-column align-items-center justify-content-center" onclick="return ajaxToggleWordRememberDetail({{$books_id}})"></div>
    </span>
@else
    <span id="wordD{{$book_id}}" >
        <div class="product_favorite d-flex flex-column align-items-center justify-content-center" onclick="return ajaxToggleWordRememberDetail({{$books_id}})"></div>
    </span>
@endif
