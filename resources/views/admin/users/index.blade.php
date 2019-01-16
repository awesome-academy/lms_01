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
                            @include('admin.users.add')
                        </div>
                        <div class="col-sm-6" >
                            {!! Form::open(['method' => 'POST', 'route' =>'search.store']) !!}
                                {!! Form::text('search', '', ['class' => 'form-control input-sm', 'placeholder' => 'Enter Search']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>@lang('user.th-name')</th>
                            <th>@lang('user.lb-gender')</th>
                            <th>@lang('user.th-email')</th>
                            <th>@lang('user.th-role')</th>
                            <th>@lang('user.th-phone')</th>
                            <th>@lang('user.th-address')</th>
                            <th>@lang('user.th-function')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @php
                                $id = $user->id;
                                $gender = $user->gender;
                                $name = $user->name;
                                $email = $user->email;
                                $role = $user->role;
                                $phone = $user->phone;
                                $address = $user->address;
                            @endphp

                            <tr class="gradeX">
                                <td>{!! $name !!}</td>
                                <td>{!! $gender !!}</td>
                                <td>{!! $email !!}</td>
                                <td>{!! $role !!}</td>
                                <td>{!! $phone !!}</td>
                                <td>{!! $address !!}</td>
                                <td class="center">
                                    <button type="button" class="btn btn-primary" data-id_user="{!! $id !!}" data-email="{!! $email!!}" data-password="{!! $user->password !!}" data-name="{!! $name!!}" data-phone="{!! $phone !!}" data-address="{!! $address !!}" data-toggle="modal" data-target="#myModal1">
                                        <i class="fa fa-edit "></i>@lang('user.btn-edit')
                                    </button>
                                    @include('admin.users.edit')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $id]]) !!}
                                        {!! Form::submit(trans('user.btn-del'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div>
                        <a href="{{route('user.create')}}" class="btn btn-success" >
                            @lang('user.export-to-excel')
                        </a>
                    </div>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
