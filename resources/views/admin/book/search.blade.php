@extends('layout.adlayout')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
                                @lang('user.btn-add')
                            </button>
                            @include('errors.error')
                            @include('admin.book.add')
                        </div>
                        <div class="col-sm-6" >
                            {!! Form::open(['method' => 'POST', 'route' =>'searchbook.store']) !!}
                                {!! Form::text('search', '', ['class' => 'form-control input-sm', 'placeholder' => 'Enter Search']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>@lang('book.lb-stt')</th>
                            <th>@lang('book.lb-category')</th>
                            <th>@lang('book.lb-title')</th>
                            <th>@lang('book.lb-preview')</th>
                            <th>@lang('book.lb-author')</th>
                            <th>@lang('book.lb-publisher')</th>
                            <th>@lang('book.lb-picture')</th>
                            <th>@lang('book.lb-status')</th>
                            <th>@lang('user.th-function')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getSearch as $book)

                            <tr class="gradeX">
                                <td>{!! $loop->index !!}</td>
                                <td>{!! $book->cat_name !!}</td>
                                <td>{!! $book->title !!}</td>
                                <td>{!! $book->preview !!}</td>
                                <td>{!! $book->auth_name !!}</td>
                                <td>{!! $book->pub_name !!}</td>
                                <td>

                                </td>
                                <td>
                                    <label class="switch switch-3d switch-success mr-3" id="active{{$book->id}}">
                                        @if($book->status == config('setting.status_1'))
                                            <img src="/assets/images/active.gif" onclick="return ajaxToggleActiveBook({{$book->id}}, 1)"/>
                                        @else
                                            <img src="/assets/images/deactive.gif" onclick="return ajaxToggleActiveBook({{$book->id}}, 0)"/>
                                        @endif

                                    </label>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn btn-primary" data-id_book="{!! $book->id !!}" data-title="{!! $book->title !!}" data-preview="{!! $book->preview !!}" data-picture="{!! $book->picture !!}" data-toggle="modal" data-target="#myModalBook">
                                        <i class="fa fa-edit "></i>@lang('user.btn-edit')
                                    </button>
                                    @include('admin.book.edit')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['book.destroy', $book->id]]) !!}
                                        {!! Form::submit(trans('user.btn-del'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div>
                        <a href="{{route('book.create')}}" class="btn btn-success" >
                            @lang('user.export-to-excel')
                        </a>
                    </div>
                    <div>
                        {{ $getSearch->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
