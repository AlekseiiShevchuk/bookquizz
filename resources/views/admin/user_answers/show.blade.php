@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-answers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.user-answers.fields.user')</th>
                            <td>{{ $user_answer->user->device_id or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-answers.fields.user-answer')</th>
                            <td>{{ $user_answer->user_answer->text or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.possible-answers.fields.is-correct')</th>
                            <td>{{ Form::checkbox("is_correct", 1, isset($user_answer->user_answer) ? $user_answer->user_answer->is_correct == 1, ["disabled"]) : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-answers.fields.quiz')</th>
                            <td>{{ $user_answer->quiz->type or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quizzes.fields.question')</th>
                            <td>{{ isset($user_answer->quiz) ? $user_answer->quiz->question : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.user_answers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop