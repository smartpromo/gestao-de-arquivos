@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.medico.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.medico.fields.nome')</th>
                            <td field-key='nome'>{{ $medico->nome }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.email')</th>
                            <td field-key='email'>{{ $medico->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.fone')</th>
                            <td field-key='fone'>{{ $medico->fone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.especialidade')</th>
                            <td field-key='especialidade'>{{ $medico->especialidade }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.crm')</th>
                            <td field-key='crm'>{{ $medico->crm }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.uf-do-crm')</th>
                            <td field-key='uf_do_crm'>{{ $medico->uf_do_crm }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.cpf')</th>
                            <td field-key='cpf'>{{ $medico->cpf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.rg')</th>
                            <td field-key='rg'>{{ $medico->rg }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.created-by')</th>
                            <td field-key='created_by'>{{ $medico->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medico.fields.created-by-team')</th>
                            <td field-key='created_by_team'>{{ $medico->created_by_team->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#clientes" aria-controls="clientes" role="tab" data-toggle="tab">Clientes </a></li>
<li role="presentation" class=""><a href="#relatorios" aria-controls="relatorios" role="tab" data-toggle="tab">Relatórios</a></li>
<li role="presentation" class=""><a href="#guias" aria-controls="guias" role="tab" data-toggle="tab">Envio de guias</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="clientes">
<table class="table table-bordered table-striped {{ count($clientes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.clientes.fields.medico')</th>
                        <th>@lang('quickadmin.clientes.fields.periodo')</th>
                        <th>@lang('quickadmin.clientes.fields.relatorio')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($clientes) > 0)
            @foreach ($clientes as $cliente)
                <tr data-entry-id="{{ $cliente->id }}">
                    <td field-key='medico'>{{ $cliente->medico->nome or '' }}</td>
                                <td field-key='periodo'>{{ $cliente->periodo }}</td>
                                <td field-key='relatorio'>@if($cliente->relatorio)<a href="{{ asset(env('UPLOAD_PATH').'/' . $cliente->relatorio) }}" target="_blank">Download file</a>@endif</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('cliente_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clientes.restore', $cliente->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('cliente_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clientes.perma_del', $cliente->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('cliente_view')
                                    <a href="{{ route('admin.clientes.show',[$cliente->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('cliente_edit')
                                    <a href="{{ route('admin.clientes.edit',[$cliente->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('cliente_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clientes.destroy', $cliente->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="relatorios">
<table class="table table-bordered table-striped {{ count($relatorios) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.relatorios.fields.medico')</th>
                        <th>@lang('quickadmin.relatorios.fields.data-inicial')</th>
                        <th>@lang('quickadmin.relatorios.fields.data-final')</th>
                        <th>@lang('quickadmin.relatorios.fields.relatorio')</th>
                        <th>@lang('quickadmin.relatorios.fields.valor-total')</th>
                        <th>@lang('quickadmin.relatorios.fields.created-by')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($relatorios) > 0)
            @foreach ($relatorios as $relatorio)
                <tr data-entry-id="{{ $relatorio->id }}">
                    <td field-key='medico'>{{ $relatorio->medico->nome or '' }}</td>
                                <td field-key='data_inicial'>{{ $relatorio->data_inicial }}</td>
                                <td field-key='data_final'>{{ $relatorio->data_final }}</td>
                                <td field-key='relatorio'>@if($relatorio->relatorio)<a href="{{ asset(env('UPLOAD_PATH').'/' . $relatorio->relatorio) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='valor_total'>{{ $relatorio->valor_total }}</td>
                                <td field-key='created_by'>{{ $relatorio->created_by->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('relatorio_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.relatorios.restore', $relatorio->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('relatorio_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.relatorios.perma_del', $relatorio->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('relatorio_view')
                                    <a href="{{ route('admin.relatorios.show',[$relatorio->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('relatorio_edit')
                                    <a href="{{ route('admin.relatorios.edit',[$relatorio->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('relatorio_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.relatorios.destroy', $relatorio->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="guias">
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

            <a href="{{ route('admin.medicos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
