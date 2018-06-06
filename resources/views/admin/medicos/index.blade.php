@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.medico.title')</h3>
    @can('medico_create')
    <p>
        <a href="{{ route('admin.medicos.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('medico_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.medicos.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.medicos.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($medicos) > 0 ? 'datatable' : '' }} @can('medico_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('medico_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.medico.fields.nome')</th>
                        <th>@lang('quickadmin.medico.fields.email')</th>
                        <th>@lang('quickadmin.medico.fields.fone')</th>
                        <th>@lang('quickadmin.medico.fields.especialidade')</th>
                        <th>@lang('quickadmin.medico.fields.crm')</th>
                        <th>@lang('quickadmin.medico.fields.uf-do-crm')</th>
                        <th>@lang('quickadmin.medico.fields.cpf')</th>
                        <th>@lang('quickadmin.medico.fields.rg')</th>
                        <th>@lang('quickadmin.medico.fields.created-by')</th>
                        <th>@lang('quickadmin.medico.fields.created-by-team')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($medicos) > 0)
                        @foreach ($medicos as $medico)
                            <tr data-entry-id="{{ $medico->id }}">
                                @can('medico_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='nome'>{{ $medico->nome }}</td>
                                <td field-key='email'>{{ $medico->email }}</td>
                                <td field-key='fone'>{{ $medico->fone }}</td>
                                <td field-key='especialidade'>{{ $medico->especialidade }}</td>
                                <td field-key='crm'>{{ $medico->crm }}</td>
                                <td field-key='uf_do_crm'>{{ $medico->uf_do_crm }}</td>
                                <td field-key='cpf'>{{ $medico->cpf }}</td>
                                <td field-key='rg'>{{ $medico->rg }}</td>
                                <td field-key='created_by'>{{ $medico->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $medico->created_by_team->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('medico_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.medicos.restore', $medico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('medico_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.medicos.perma_del', $medico->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
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
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="15">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('medico_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.medicos.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection