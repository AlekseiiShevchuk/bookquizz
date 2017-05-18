@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.interviews.title')</h3>
    @can('interview_create')
    <p>
        <a href="{{ route('admin.interviews.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($interviews) > 0 ? 'datatable' : '' }} @can('interview_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('interview_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.interviews.fields.title')</th>
                        <th>@lang('quickadmin.interviews.fields.description')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($interviews) > 0)
                        @foreach ($interviews as $interview)
                            <tr data-entry-id="{{ $interview->id }}">
                                @can('interview_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $interview->title }}</td>
                                <td>{!! $interview->description !!}</td>
                                <td>
                                    @can('interview_view')
                                    <a href="{{ route('admin.interviews.show',[$interview->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('interview_edit')
                                    <a href="{{ route('admin.interviews.edit',[$interview->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('interview_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.interviews.destroy', $interview->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('interview_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.interviews.mass_destroy') }}';
        @endcan

    </script>
@endsection