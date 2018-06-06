@extends('layouts.app')

@section('content')
    <div class="row">
         <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added guias</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('quickadmin.guias.fields.nome-do-pacinte')</th> 
                            <th> @lang('quickadmin.guias.fields.horario-inicial')</th> 
                            <th> @lang('quickadmin.guias.fields.horario-final')</th> 
                            <th> @lang('quickadmin.guias.fields.horario-especial')</th> 
                            <th> @lang('quickadmin.guias.fields.via')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($guias as $guia)
                            <tr>
                               
                                <td>{{ $guia->nome_do_pacinte }} </td> 
                                <td>{{ $guia->horario_inicial }} </td> 
                                <td>{{ $guia->horario_final }} </td> 
                                <td>{{ $guia->horario_especial }} </td> 
                                <td>{{ $guia->via }} </td> 
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
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added medicos</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('quickadmin.medico.fields.nome')</th> 
                            <th> @lang('quickadmin.medico.fields.email')</th> 
                            <th> @lang('quickadmin.medico.fields.fone')</th> 
                            <th> @lang('quickadmin.medico.fields.especialidade')</th> 
                            <th> @lang('quickadmin.medico.fields.crm')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($medicos as $medico)
                            <tr>
                               
                                <td>{{ $medico->nome }} </td> 
                                <td>{{ $medico->email }} </td> 
                                <td>{{ $medico->fone }} </td> 
                                <td>{{ $medico->especialidade }} </td> 
                                <td>{{ $medico->crm }} </td> 
                                <td>

                                    @can('medico_view')
                                    <a href="{{ route('admin.medicos.show',[$medico->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan

                                    @can('medico_edit')
                                    <a href="{{ route('admin.medicos.edit',[$medico->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan

                                    @can('medico_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.medicos.destroy', $medico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>


    </div>
@endsection

