@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.convenios.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.convenios.fields.convenio')</th>
                            <td field-key='convenio'>{{ $convenio->convenio }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.convenios.fields.created-by')</th>
                            <td field-key='created_by'>{{ $convenio->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.convenios.fields.created-by-team')</th>
                            <td field-key='created_by_team'>{{ $convenio->created_by_team->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#guias" aria-controls="guias" role="tab" data-toggle="tab">Envio de guias</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="guias">
<table class="table table-bordered table-striped {{ count($guias) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.guias.fields.medico')</th>
                        <th>@lang('quickadmin.guias.fields.nome-do-pacinte')</th>
                        <th>@lang('quickadmin.guias.fields.convenio')</th>
                        <th>@lang('quickadmin.guias.fields.tipo-de-guia')</th>
                        <th>@lang('quickadmin.guias.fields.guia')</th>
                        <th>@lang('quickadmin.guias.fields.created-by')</th>
                        <th>@lang('quickadmin.guias.fields.created-by-team')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($guias) > 0)
            @foreach ($guias as $guia)
                <tr data-entry-id="{{ $guia->id }}">
                    <td field-key='medico'>{{ $guia->medico->nome or '' }}</td>
                                <td field-key='nome_do_pacinte'>{{ $guia->nome_do_pacinte }}</td>
                                <td field-key='convenio'>{{ $guia->convenio->convenio or '' }}</td>
                                <td field-key='tipo_de_guia'>{{ $guia->tipo_de_guia }}</td>
                                <td field-key='guia'>@if($guia->guia)<a href="{{ asset(env('UPLOAD_PATH').'/' . $guia->guia) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='created_by'>{{ $guia->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $guia->created_by_team->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('guia_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.guias.restore', $guia->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('guia_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.guias.perma_del', $guia->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('guia_view')
                                    <a href="{{ route('admin.guias.show',[$guia->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('guia_edit')
                                    <a href="{{ route('admin.guias.edit',[$guia->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('guia_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.guias.destroy', $guia->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="18">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.convenios.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
