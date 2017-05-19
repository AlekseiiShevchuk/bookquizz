@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-answers.title')</h3>
    @can('user_answer_create')
    <p>
        <a href="{{ route('admin.user_answers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($user_answers) > 0 ? 'datatable' : '' }} @can('user_answer_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_answer_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('user_answer_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $user_answer->user->device_id or '' }}</td>
                                <td>{{ $user_answer->user_answer->text or '' }}</td>
<td>{{ Form::checkbox("is_correct", 1, $user_answer->user_answer->is_correct == 1, ["disabled"]) }}</td>
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
@stop

@section('javascript') 
    <script>
        @can('user_answer_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.user_answers.mass_destroy') }}';
        @endcan

    </script>
@endsection