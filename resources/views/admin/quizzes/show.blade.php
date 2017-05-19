@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.quizzes.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.quizzes.fields.type')</th>
                            <td>{{ $quiz->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quizzes.fields.question')</th>
                            <td>{{ $quiz->question }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quizzes.fields.description')</th>
                            <td>{!! $quiz->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quizzes.fields.book')</th>
                            <td>{{ $quiz->book->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.books.fields.book-code')</th>
                            <td>{{ isset($quiz->book) ? $quiz->book->book_code : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#possibleanswers" aria-controls="possibleanswers" role="tab" data-toggle="tab">Possible answers</a></li>
<li role="presentation" class=""><a href="#useranswers" aria-controls="useranswers" role="tab" data-toggle="tab">User answers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="possibleanswers">
<table class="table table-bordered table-striped {{ count($possible_answers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.possible-answers.fields.text')</th>
                        <th>@lang('quickadmin.possible-answers.fields.is-correct')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($possible_answers) > 0)
            @foreach ($possible_answers as $possible_answer)
                <tr data-entry-id="{{ $possible_answer->id }}">
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
<div role="tabpanel" class="tab-pane " id="useranswers">
<table class="table table-bordered table-striped {{ count($user_answers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.user-answers.fields.user')</th>
                        <th>@lang('quickadmin.user-answers.fields.user-answer')</th>
                        <th>@lang('quickadmin.possible-answers.fields.is-correct')</th>
                        <th>@lang('quickadmin.user-answers.fields.quiz')</th>
                        <th>@lang('quickadmin.quizzes.fields.question')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($user_answers) > 0)
            @foreach ($user_answers as $user_answer)
                <tr data-entry-id="{{ $user_answer->id }}">
                    <td>{{ $user_answer->user->device_id or '' }}</td>
                                <td>{{ $user_answer->user_answer->text or '' }}</td>
<td>{{ Form::checkbox("is_correct", 1, $user_answer->user_answer->is_correct == 1 ? ["disabled"]: '')  }}</td>
                                <td>{{ $user_answer->quiz->type or '' }}</td>
<td>{{ isset($user_answer->quiz) ? $user_answer->quiz->question : '' }}</td>
                                <td>
                                    @can('user_answer_view')
                                    <a href="{{ route('admin.user_answers.show',[$user_answer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_answer_edit')
                                    <a href="{{ route('admin.user_answers.edit',[$user_answer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_answer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.user_answers.destroy', $user_answer->id])) !!}
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

            <a href="{{ route('admin.quizzes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop