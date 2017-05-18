@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.test-answers.title')</h3>
    @can('test_answer_create')
    <p>
        <a href="{{ route('admin.test_answers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($test_answers) > 0 ? 'datatable' : '' }} @can('test_answer_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('test_answer_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.test-answers.fields.text')</th>
                        <th>@lang('quickadmin.test-answers.fields.is-correct')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($test_answers) > 0)
                        @foreach ($test_answers as $test_answer)
                            <tr data-entry-id="{{ $test_answer->id }}">
                                @can('test_answer_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $test_answer->text }}</td>
                                <td>{{ Form::checkbox("is_correct", 1, $test_answer->is_correct == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('test_answer_view')
                                    <a href="{{ route('admin.test_answers.show',[$test_answer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('test_answer_edit')
                                    <a href="{{ route('admin.test_answers.edit',[$test_answer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('test_answer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.test_answers.destroy', $test_answer->id])) !!}
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
        @can('test_answer_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.test_answers.mass_destroy') }}';
        @endcan

    </script>
@endsection