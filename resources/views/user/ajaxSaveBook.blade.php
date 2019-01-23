@if(array_key_exists($book_id, $followBook))
    <span id="word{{$book_id}}" >
        <div class="fa fa-heart-o followstyle" onclick="return ajaxToggleWordRemember({{$book_id}})"></div>
    </span>
@else
    <span id="word{{$book_id}}" >
        <div class="fa fa-heart followstyle" onclick="return ajaxToggleWordRemember({{$book_id}})"></div>
    </span>
@endif
