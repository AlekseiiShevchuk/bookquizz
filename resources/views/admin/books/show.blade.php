@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.books.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.books.fields.title')</th>
                            <td>{{ $book->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.books.fields.book-code')</th>
                            <td>{{ $book->book_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.books.fields.author')</th>
                            <td>{{ $book->author }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.books.fields.description')</th>
                            <td>{!! $book->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.books.fields.front-cover')</th>
                            <td>@if($book->front_cover)<a href="{{ asset('uploads/' . $book->front_cover) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $book->front_cover) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.books.fields.back-cover')</th>
                            <td>@if($book->back_cover)<a href="{{ asset('uploads/' . $book->back_cover) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $book->back_cover) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.books.fields.extra-images')</th>
                            <td> @foreach($book->getMedia('extra_images') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#quizzes" aria-controls="quizzes" role="tab" data-toggle="tab">Quizzes</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="quizzes">
<table class="table table-bordered table-striped {{ count($quizzes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.books.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop