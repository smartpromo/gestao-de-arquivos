@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.guias.title')</h3>
    
    {!! Form::model($guia, ['method' => 'PUT', 'route' => ['admin.guias.update', $guia->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('horario_especial', trans('quickadmin.guias.fields.horario-especial').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('horario_especial', 0) !!}
                    {!! Form::checkbox('horario_especial', 1, old('horario_especial', old('horario_especial')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('horario_especial'))
                        <p class="help-block">
                            {{ $errors->first('horario_especial') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('via', trans('quickadmin.guias.fields.via').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('via', $enum_via, old('via'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('via'))
                        <p class="help-block">
                            {{ $errors->first('via') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tipo_de_guia', trans('quickadmin.guias.fields.tipo-de-guia').'', ['class' => 'control-label']) !!}
                    {!! Form::select('tipo_de_guia', $enum_tipo_de_guia, old('tipo_de_guia'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tipo_de_guia'))
                        <p class="help-block">
                            {{ $errors->first('tipo_de_guia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('guia', trans('quickadmin.guias.fields.guia').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('guia', old('guia')) !!}
                    @if ($guia->guia)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $guia->guia) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('guia', ['class' => 'form-control']) !!}
                    {!! Form::hidden('guia_max_size', 3) !!}
                    <p class="help-block">Anexar guia </p>
                    @if($errors->has('guia'))
                        <p class="help-block">
                            {{ $errors->first('guia') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
   <script src="/adminlte/js/mapInput.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
@stop