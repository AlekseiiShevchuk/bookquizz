@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-interview-answers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.user-interview-answers.fields.user')</th>
                            <td>{{ $user_interview_answer->user->device_id or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-interview-answers.fields.interview-answer')</th>
                            <td>{{ $user_interview_answer->interview_answer->text or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-interview-answers.fields.interview')</th>
                            <td>{{ $user_interview_answer->interview->title or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.user_interview_answers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop