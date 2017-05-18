@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-test-answers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.user-test-answers.fields.user')</th>
                            <td>{{ $user_test_answer->user->device_id or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-test-answers.fields.test-answer')</th>
                            <td>{{ $user_test_answer->test_answer->text or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-test-answers.fields.test')</th>
                            <td>{{ $user_test_answer->test->title or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.user_test_answers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop