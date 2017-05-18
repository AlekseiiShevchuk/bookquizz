@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.interview-answers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.interview-answers.fields.text')</th>
                            <td>{{ $interview_answer->text }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#userinterviewanswers" aria-controls="userinterviewanswers" role="tab" data-toggle="tab">User interview answers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="userinterviewanswers">
<table class="table table-bordered table-striped {{ count($user_interview_answers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.user-interview-answers.fields.user')</th>
                        <th>@lang('quickadmin.user-interview-answers.fields.interview-answer')</th>
                        <th>@lang('quickadmin.user-interview-answers.fields.interview')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($user_interview_answers) > 0)
            @foreach ($user_interview_answers as $user_interview_answer)
                <tr data-entry-id="{{ $user_interview_answer->id }}">
                    <td>{{ $user_interview_answer->user->device_id or '' }}</td>
                                <td>{{ $user_interview_answer->interview_answer->text or '' }}</td>
                                <td>{{ $user_interview_answer->interview->title or '' }}</td>
                                <td>
                                    @can('user_interview_answer_view')
                                    <a href="{{ route('admin.user_interview_answers.show',[$user_interview_answer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_interview_answer_edit')
                                    <a href="{{ route('admin.user_interview_answers.edit',[$user_interview_answer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_interview_answer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.user_interview_answers.destroy', $user_interview_answer->id])) !!}
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

            <a href="{{ route('admin.interview_answers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop