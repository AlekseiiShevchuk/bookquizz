@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.test-answers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.test-answers.fields.text')</th>
                            <td>{{ $test_answer->text }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.test-answers.fields.is-correct')</th>
                            <td>{{ Form::checkbox("is_correct", 1, $test_answer->is_correct == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#usertestanswers" aria-controls="usertestanswers" role="tab" data-toggle="tab">User test answers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="usertestanswers">
<table class="table table-bordered table-striped {{ count($user_test_answers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.test_answers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop