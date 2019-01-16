@if($presentStatus == config('setting.status_1'))
    <label class="switch switch-3d switch-success mr-3" id="active{{$id}}">
        <img src="/assets/images/deactive.gif" onclick="return ajaxToggleActiveComment({{$id}},0)"/>
    </label>
@else
    <label class="switch switch-3d switch-success mr-3" id="active{{$id}}">
        <img src="/assets/images/active.gif" onclick="return ajaxToggleActiveComment({{$id}},1)"/>
    </label>
@endif
