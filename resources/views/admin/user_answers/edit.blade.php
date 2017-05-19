@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-answers.title')</h3>
    
    {!! Form::model($user_answer, ['method' => 'PUT', 'route' => ['admin.user_answers.update', $user_answer->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', 'User*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_answer_id', 'User answer*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_answer_id', $user_answers, old('user_answer_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_answer_id'))
                        <p class="help-block">
                            {{ $errors->first('user_answer_id') }}
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
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

