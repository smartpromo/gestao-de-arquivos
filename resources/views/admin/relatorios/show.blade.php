@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.relatorios.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.relatorios.fields.medico')</th>
                            <td field-key='medico'>{{ $relatorio->medico->nome or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.relatorios.fields.data-inicial')</th>
                            <td field-key='data_inicial'>{{ $relatorio->data_inicial }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.relatorios.fields.data-final')</th>
                            <td field-key='data_final'>{{ $relatorio->data_final }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.relatorios.fields.relatorio')</th>
                            <td field-key='relatorio'>@if($relatorio->relatorio)<a href="{{ asset(env('UPLOAD_PATH').'/' . $relatorio->relatorio) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.relatorios.fields.valor-total')</th>
                            <td field-key='valor_total'>{{ $relatorio->valor_total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.relatorios.fields.created-by')</th>
                            <td field-key='created_by'>{{ $relatorio->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.relatorios.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
