@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.relatorios.title')</h3>
    @can('relatorio_create')
    <p>
        <a href="{{ route('admin.relatorios.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('relatorio_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.relatorios.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.relatorios.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($relatorios) > 0 ? 'datatable' : '' }} @can('relatorio_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('relatorio_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('relatorio_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
    </div>
@stop

@section('javascript') 
    <script>
        @can('relatorio_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.relatorios.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection