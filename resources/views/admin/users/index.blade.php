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
                            @include('admin.users.add')
                        </div>
                        <div class="col-sm-6" style="text-align: right;">
                        	{!! Form::open(['method' => 'POST', 'route' =>'admin.users.index']) !!}
                        		{!! Form::text('search', '', ['class' => 'form-control input-sm', 'placeholder' => 'Enter Search']) !!}
                            {!! Form::close() !!}</br>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>@lang('user.th-id')</th>
                                <th>@lang('user.th-name')</th>
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
                                $name = $user->name;
                                $email = $user->email;
                                $role = $user->role;
                                $phone = $user->phone;
                                $address = $user->address;
                            @endphp

                            <tr class="gradeX">
                                <td>{!! $id !!}</td>
                                <td>{!! $name !!}</td>
                                <td>{!! $email !!}</td>
                                <td>
                                    @if($role === 0)
                                        @lang('user.role-mod')
                                    @else
                                        @lang('user.role-admin')
                                    @endif
                                </td>
                                <td>{!! $phone !!}</td>
                                <td>{!! $address !!}</td>
                                <td class="center">
                                    <button type="button" class="btn btn-primary" data-id_user="{!! $id !!}" data-email="{!! $email!!}"
                                            data-name="{!! $name!!}" data-phone="{!! $phone !!}" data-address="{!! $address !!}" data-toggle="modal" data-target="#myModal1">
                                        <i class="fa fa-edit "></i>@lang('user.btn-edit')
                                    </button>
                                    @include('admin.users.edit')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $id]]) !!}
                                        {!! Form::submit(trans('user.btn-del'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>                    
                </div>

            </div>
        </div>
    </div>
@endsection
