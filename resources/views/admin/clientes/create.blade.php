@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clientes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clientes.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('medico_id', trans('quickadmin.clientes.fields.medico').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('periodo', trans('quickadmin.clientes.fields.periodo').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('periodo', old('periodo'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('periodo'))
                        <p class="help-block">
                            {{ $errors->first('periodo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('relatorio', trans('quickadmin.clientes.fields.relatorio').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('relatorio', old('relatorio')) !!}
                    {!! Form::file('relatorio', ['class' => 'form-control', 'required' => '']) !!}
                    {!! Form::hidden('relatorio_max_size', 2) !!}
                    <p class="help-block"></p>
                    @if($errors->has('relatorio'))
                        <p class="help-block">
                            {{ $errors->first('relatorio') }}
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

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop