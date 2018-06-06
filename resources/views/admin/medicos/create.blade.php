@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.medico.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.medicos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nome', trans('quickadmin.medico.fields.nome').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nome'))
                        <p class="help-block">
                            {{ $errors->first('nome') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.medico.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fone', trans('quickadmin.medico.fields.fone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('fone', old('fone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fone'))
                        <p class="help-block">
                            {{ $errors->first('fone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('especialidade', trans('quickadmin.medico.fields.especialidade').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('especialidade', old('especialidade'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('especialidade'))
                        <p class="help-block">
                            {{ $errors->first('especialidade') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('crm', trans('quickadmin.medico.fields.crm').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('crm', old('crm'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('crm'))
                        <p class="help-block">
                            {{ $errors->first('crm') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uf_do_crm', trans('quickadmin.medico.fields.uf-do-crm').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('uf_do_crm', old('uf_do_crm'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('uf_do_crm'))
                        <p class="help-block">
                            {{ $errors->first('uf_do_crm') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cpf', trans('quickadmin.medico.fields.cpf').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cpf', old('cpf'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cpf'))
                        <p class="help-block">
                            {{ $errors->first('cpf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rg', trans('quickadmin.medico.fields.rg').'', ['class' => 'control-label']) !!}
                    {!! Form::number('rg', old('rg'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rg'))
                        <p class="help-block">
                            {{ $errors->first('rg') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('created_by_id', trans('quickadmin.medico.fields.created-by').'', ['class' => 'control-label']) !!}
                    {!! Form::select('created_by_id', $created_bies, old('created_by_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('created_by_id'))
                        <p class="help-block">
                            {{ $errors->first('created_by_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('created_by_team_id', trans('quickadmin.medico.fields.created-by-team').'', ['class' => 'control-label']) !!}
                    {!! Form::select('created_by_team_id', $created_by_teams, old('created_by_team_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('created_by_team_id'))
                        <p class="help-block">
                            {{ $errors->first('created_by_team_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

