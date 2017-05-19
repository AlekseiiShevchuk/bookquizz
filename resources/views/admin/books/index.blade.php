@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.books.title')</h3>
    @can('book_create')
    <p>
        <a href="{{ route('admin.books.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($books) > 0 ? 'datatable' : '' }} @can('book_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('book_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.books.fields.title')</th>
                        <th>@lang('quickadmin.books.fields.book-code')</th>
                        <th>@lang('quickadmin.books.fields.author')</th>
                        <th>@lang('quickadmin.books.fields.description')</th>
                        <th>@lang('quickadmin.books.fields.front-cover')</th>
                        <th>@lang('quickadmin.books.fields.back-cover')</th>
                        <th>@lang('quickadmin.books.fields.extra-images')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($books) > 0)
                        @foreach ($books as $book)
                            <tr data-entry-id="{{ $book->id }}">
                                @can('book_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $book->title }}</td>
                                <td>{{ $book->book_code }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{!! $book->description !!}</td>
                                <td>@if($book->front_cover)<a href="{{ asset('uploads/' . $book->front_cover) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $book->front_cover) }}"/></a>@endif</td>
                                <td>@if($book->back_cover)<a href="{{ asset('uploads/' . $book->back_cover) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $book->back_cover) }}"/></a>@endif</td>
                                <td> @foreach($book->getMedia('extra_images') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                                <td>
                                    @can('book_view')
                                    <a href="{{ route('admin.books.show',[$book->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('book_edit')
                                    <a href="{{ route('admin.books.edit',[$book->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('book_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.books.destroy', $book->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('book_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.books.mass_destroy') }}';
        @endcan

    </script>
@endsection