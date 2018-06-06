@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.relatorios.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.relatorios.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('medico_id', trans('quickadmin.relatorios.fields.medico').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('data_inicial', trans('quickadmin.relatorios.fields.data-inicial').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data_inicial', old('data_inicial'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('data_inicial'))
                        <p class="help-block">
                            {{ $errors->first('data_inicial') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('data_final', trans('quickadmin.relatorios.fields.data-final').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('data_final', old('data_final'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('data_final'))
                        <p class="help-block">
                            {{ $errors->first('data_final') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('relatorio', trans('quickadmin.relatorios.fields.relatorio').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('relatorio', old('relatorio')) !!}
                    {!! Form::file('relatorio', ['class' => 'form-control', 'required' => '']) !!}
                    {!! Form::hidden('relatorio_max_size', 5) !!}
                    <p class="help-block"></p>
                    @if($errors->has('relatorio'))
                        <p class="help-block">
                            {{ $errors->first('relatorio') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('valor_total', trans('quickadmin.relatorios.fields.valor-total').'', ['class' => 'control-label']) !!}
                    {!! Form::text('valor_total', old('valor_total'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('valor_total'))
                        <p class="help-block">
                            {{ $errors->first('valor_total') }}
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