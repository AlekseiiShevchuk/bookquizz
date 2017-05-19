@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.possible-answers.title')</h3>
    @can('possible_answer_create')
    <p>
        <a href="{{ route('admin.possible_answers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($possible_answers) > 0 ? 'datatable' : '' }} @can('possible_answer_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('possible_answer_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.possible-answers.fields.text')</th>
                        <th>@lang('quickadmin.possible-answers.fields.is-correct')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($possible_answers) > 0)
                        @foreach ($possible_answers as $possible_answer)
                            <tr data-entry-id="{{ $possible_answer->id }}">
                                @can('possible_answer_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $possible_answer->text }}</td>
                                <td>{{ Form::checkbox("is_correct", 1, $possible_answer->is_correct == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('possible_answer_view')
                                    <a href="{{ route('admin.possible_answers.show',[$possible_answer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('possible_answer_edit')
                                    <a href="{{ route('admin.possible_answers.edit',[$possible_answer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('possible_answer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.possible_answers.destroy', $possible_answer->id])) !!}
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
        @can('possible_answer_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.possible_answers.mass_destroy') }}';
        @endcan

    </script>
@endsection