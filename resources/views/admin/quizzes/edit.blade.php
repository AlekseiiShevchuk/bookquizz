@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.quizzes.title')</h3>
    
    {!! Form::model($quiz, ['method' => 'PUT', 'route' => ['admin.quizzes.update', $quiz->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', 'Type (test or just interview)*', ['class' => 'control-label']) !!}
                    {!! Form::select('type', $enum_type, old('type'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question', 'Question*', ['class' => 'control-label']) !!}
                    {!! Form::text('question', old('question'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question'))
                        <p class="help-block">
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('book_id', 'Book*', ['class' => 'control-label']) !!}
                    {!! Form::select('book_id', $books, old('book_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('book_id'))
                        <p class="help-block">
                            {{ $errors->first('book_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Possible answers
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.possible-answers.fields.text')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="possible-answers">
                    @forelse(old('possible_answers', []) as $index => $data)
                        @include('admin.quizzes.possible_answers_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($quiz->possibleAnswers as $item)
                            @include('admin.quizzes.possible_answers_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script type="text/html" id="possible-answers-template">
        @include('admin.quizzes.possible_answers_row', [
            'index' => '_INDEX_'
        ])
    </script>

            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop