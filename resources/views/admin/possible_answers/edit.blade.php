@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.possible-answers.title')</h3>
    
    {!! Form::model($possible_answer, ['method' => 'PUT', 'route' => ['admin.possible_answers.update', $possible_answer->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('text', 'Text*', ['class' => 'control-label']) !!}
                    {!! Form::text('text', old('text'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('text'))
                        <p class="help-block">
                            {{ $errors->first('text') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quiz_id', 'Quiz*', ['class' => 'control-label']) !!}
                    {!! Form::select('quiz_id', $quizzes, old('quiz_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quiz_id'))
                        <p class="help-block">
                            {{ $errors->first('quiz_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_correct', 'Is correct (if this is a test-quiz, you should choose at least one correct answer)', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_correct', 0) !!}
                    {!! Form::checkbox('is_correct', 1, old('is_correct'), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_correct'))
                        <p class="help-block">
                            {{ $errors->first('is_correct') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

