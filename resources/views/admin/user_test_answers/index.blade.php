@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-test-answers.title')</h3>
    @can('user_test_answer_create')
    <p>
        <a href="{{ route('admin.user_test_answers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($user_test_answers) > 0 ? 'datatable' : '' }} @can('user_test_answer_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_test_answer_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.user-test-answers.fields.user')</th>
                        <th>@lang('quickadmin.user-test-answers.fields.test-answer')</th>
                        <th>@lang('quickadmin.user-test-answers.fields.test')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($user_test_answers) > 0)
                        @foreach ($user_test_answers as $user_test_answer)
                            <tr data-entry-id="{{ $user_test_answer->id }}">
                                @can('user_test_answer_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $user_test_answer->user->device_id or '' }}</td>
                                <td>{{ $user_test_answer->test_answer->text or '' }}</td>
                                <td>{{ $user_test_answer->test->title or '' }}</td>
                                <td>
                                    @can('user_test_answer_view')
                                    <a href="{{ route('admin.user_test_answers.show',[$user_test_answer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_test_answer_edit')
                                    <a href="{{ route('admin.user_test_answers.edit',[$user_test_answer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_test_answer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.user_test_answers.destroy', $user_test_answer->id])) !!}
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
        @can('user_test_answer_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.user_test_answers.mass_destroy') }}';
        @endcan

    </script>
@endsection