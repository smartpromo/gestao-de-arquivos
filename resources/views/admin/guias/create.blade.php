@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.guias.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.guias.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('medico_id', trans('quickadmin.guias.fields.medico').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('medico_id', $medicos, old('medico_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('medico_id'))
                        <p class="help-block">
                            {{ $errors->first('medico_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome_do_pacinte', trans('quickadmin.guias.fields.nome-do-pacinte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome_do_pacinte', old('nome_do_pacinte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome_do_pacinte'))
                        <p class="help-block">
                            {{ $errors->first('nome_do_pacinte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('convenio_id', trans('quickadmin.guias.fields.convenio').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('convenio_id', $convenios, old('convenio_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('convenio_id'))
                        <p class="help-block">
                            {{ $errors->first('convenio_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('horario_inicial', trans('quickadmin.guias.fields.horario-inicial').'', ['class' => 'control-label']) !!}
                    {!! Form::text('horario_inicial', old('horario_inicial'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('horario_inicial'))
                        <p class="help-block">
                            {{ $errors->first('horario_inicial') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('horario_final', trans('quickadmin.guias.fields.horario-final').'', ['class' => 'control-label']) !!}
                    {!! Form::text('horario_final', old('horario_final'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('horario_final'))
                        <p class="help-block">
                            {{ $errors->first('horario_final') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('horario_especial', trans('quickadmin.guias.fields.horario-especial').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('horario_especial', 0) !!}
                    {!! Form::checkbox('horario_especial', 1, old('horario_especial', false), []) !!}
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
                    {!! Form::label('local_address', trans('quickadmin.guias.fields.local').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('local_address', old('local_address'), ['class' => 'form-control map-input', 'id' => 'local-input', 'required' => '']) !!}
                    {!! Form::hidden('local_latitude', 0 , ['id' => 'local-latitude']) !!}
                    {!! Form::hidden('local_longitude', 0 , ['id' => 'local-longitude']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('local'))
                        <p class="help-block">
                            {{ $errors->first('local') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div id="local-map-container" style="width:100%;height:200px; ">
                <div style="width: 100%; height: 100%" id="local-map"></div>
            </div>
            @if(!env('GOOGLE_MAPS_API_KEY'))
                <b>'GOOGLE_MAPS_API_KEY' is not set in the .env</b>
            @endif
            
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
                    {!! Form::label('acomodacoes', trans('quickadmin.guias.fields.acomodacoes').'', ['class' => 'control-label']) !!}
                    {!! Form::select('acomodacoes', $enum_acomodacoes, old('acomodacoes'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('acomodacoes'))
                        <p class="help-block">
                            {{ $errors->first('acomodacoes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('guia', trans('quickadmin.guias.fields.guia').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('guia', old('guia')) !!}
                    {!! Form::file('guia', ['class' => 'form-control', 'required' => '']) !!}
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

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
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