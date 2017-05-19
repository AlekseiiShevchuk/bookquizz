@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.quizzes.title')</h3>
    @can('quiz_create')
    <p>
        <a href="{{ route('admin.quizzes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($quizzes) > 0 ? 'datatable' : '' }} @can('quiz_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('quiz_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.quizzes.fields.type')</th>
                        <th>@lang('quickadmin.quizzes.fields.question')</th>
                        <th>@lang('quickadmin.quizzes.fields.description')</th>
                        <th>@lang('quickadmin.quizzes.fields.book')</th>
                        <th>@lang('quickadmin.books.fields.book-code')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($quizzes) > 0)
                        @foreach ($quizzes as $quiz)
                            <tr data-entry-id="{{ $quiz->id }}">
                                @can('quiz_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $quiz->type }}</td>
                                <td>{{ $quiz->question }}</td>
                                <td>{!! $quiz->description !!}</td>
                                <td>{{ $quiz->book->title or '' }}</td>
<td>{{ isset($quiz->book) ? $quiz->book->book_code : '' }}</td>
                                <td>
                                    @can('quiz_view')
                                    <a href="{{ route('admin.quizzes.show',[$quiz->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('quiz_edit')
                                    <a href="{{ route('admin.quizzes.edit',[$quiz->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('quiz_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.quizzes.destroy', $quiz->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('quiz_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.quizzes.mass_destroy') }}';
        @endcan

    </script>
@endsection