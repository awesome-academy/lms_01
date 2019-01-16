@extends('layout.adlayout')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-6">
                            @include('errors.error')
                        </div>
                        <div class="col-sm-6" >
                            {!! Form::open(['method' => 'POST', 'route' =>'comment.store']) !!}
                                {!! Form::text('search', '', ['class' => 'form-control input-sm', 'placeholder' => 'Enter Search']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>@lang('comment.th-stt')</th>
                            <th>@lang('comment.th-name')</th>
                            <th>@lang('comment.th-book')</th>
                            <th>@lang('comment.th-content')</th>
                            <th>@lang('comment.th-create')</th>
                            <th>@lang('comment.th-status')</th>
                            <th>@lang('user.th-function')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            @php
                                $id = $comment->id;
                                $name = $comment->name;
                                $book = $comment->title;
                                $content = $comment->content;
                                $create = $comment->created_at;
                                $status = $comment->status;
                            @endphp

                            <tr class="gradeX">
                                <td>{!! $loop->index !!}</td>
                                <td>{!! $name !!}</td>
                                <td>{!! $book !!}</td>
                                <td>{!! $content !!}</td>
                                <td>{!! $create !!}</td>
                                <td>
                                    <label class="switch switch-3d switch-success mr-3" id="active{{$comment->id}}">
                                        @if($comment->status == config('setting.status_1'))
                                            <img src="/assets/images/active.gif" onclick="return ajaxToggleActiveComment({{$comment->id}},1)"/>
                                        @else
                                            <img src="/assets/images/deactive.gif" onclick="return ajaxToggleActiveComment({{$comment->id}},0)"/>
                                        @endif

                                    </label>
                                </td>
                                <td class="center">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['comment.destroy', $id]]) !!}
                                        {!! Form::submit(trans('user.btn-del'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div>
                        {{ $comments->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function ajaxToggleActiveComment(id, presentStatus){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/comment/update-status",
                type: 'POST',
                cache: false,
                data: {id:id, presentStatus:presentStatus},
                success: function(data){
                    $( '#active'+id ).replaceWith( data );
                },
                error: function (){
                    alert('có lỗi xảy ra');
                }
            });
        }
    </script>
@endsection
