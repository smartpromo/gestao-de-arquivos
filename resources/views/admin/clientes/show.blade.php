@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clientes.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.periodo')</th>
                            <td field-key='periodo'>{{ $cliente->periodo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clientes.fields.relatorio')</th>
                            <td field-key='relatorio'>@if($cliente->relatorio)<a href="{{ asset(env('UPLOAD_PATH').'/' . $cliente->relatorio) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clientes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
