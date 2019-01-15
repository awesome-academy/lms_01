<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">@lang('user.modal-title-edit')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'route' => 'user.edit']) !!}
                    {!! Form::hidden('user_id', '', ['id' => 'id_user']) !!}
                    <div class="form-group ">
                        {!! Form::label('email', trans('user.lb-email'), ['class' => 'col-md-4 col-form-label']) !!}
                        {!! Form::email('email', '', ['class' => "form-control ",'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', trans('user.lb-password'), ['class' => 'col-md-4 col-form-label']) !!}
                        {!! Form::password('password',['class' => "form-control "]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', trans('user.lb-name'), ['class' => 'col-md-4 col-form-label']) !!}
                        {!! Form::text('name', '', ['class' => 'form-control ']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', trans('user.lb-gender'), ['class' => 'col-md-4 col-form-label']) !!}
                        {!! Form::select('gender', [config('setting.gender-female') => trans('user.select-female'), config('setting.gender-male') => trans('user.select-male')]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('dob', trans('user.lb-dob'), ['class' => 'col-md-4 col-form-label']) !!}
                        {!! Form::date('dob', \Carbon\Carbon::now(), ['class' => 'form-control ']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', trans('user.lb-address'), ['class' => 'col-md-4 col-form-label']) !!}
                        {!! Form::text('address', '', ['class' => 'form-control ']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', trans('user.lb-phone'), ['class' => 'col-md-4 col-form-label']) !!}
                        {!! Form::text('phone', '', ['class' => 'form-control ']) !!}
                    </div>
                    {!! Form::submit(trans('user.btn-edit'), ['class' => 'btn btn-success btn-md ']) !!}
                {!! Form::close() !!}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('btn-close')</button>
            </div>

        </div>
    </div>
</div>
