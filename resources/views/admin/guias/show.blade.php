@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.guias.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.guias.fields.medico')</th>
                            <td field-key='medico'>{{ $guia->medico->nome or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.nome-do-pacinte')</th>
                            <td field-key='nome_do_pacinte'>{{ $guia->nome_do_pacinte }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.convenio')</th>
                            <td field-key='convenio'>{{ $guia->convenio->convenio or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.horario-inicial')</th>
                            <td field-key='horario_inicial'>{{ $guia->horario_inicial }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.horario-final')</th>
                            <td field-key='horario_final'>{{ $guia->horario_final }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.horario-especial')</th>
                            <td field-key='horario_especial'>{{ Form::checkbox("horario_especial", 1, $guia->horario_especial == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.local')</th>
                            <td field-key='local'>{{ $guia->local_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.via')</th>
                            <td field-key='via'>{{ $guia->via }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.tipo-de-guia')</th>
                            <td field-key='tipo_de_guia'>{{ $guia->tipo_de_guia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.acomodacoes')</th>
                            <td field-key='acomodacoes'>{{ $guia->acomodacoes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.guia')</th>
                            <td field-key='guia'>@if($guia->guia)<a href="{{ asset(env('UPLOAD_PATH').'/' . $guia->guia) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.created-by')</th>
                            <td field-key='created_by'>{{ $guia->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.guias.fields.created-by-team')</th>
                            <td field-key='created_by_team'>{{ $guia->created_by_team->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.guias.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
