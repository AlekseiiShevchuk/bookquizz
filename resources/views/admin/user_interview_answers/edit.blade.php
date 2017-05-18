@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-interview-answers.title')</h3>
    
    {!! Form::model($user_interview_answer, ['method' => 'PUT', 'route' => ['admin.user_interview_answers.update', $user_interview_answer->id]]) !!}

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
                    {!! Form::label('interview_answer_id', 'Interview answer*', ['class' => 'control-label']) !!}
                    {!! Form::select('interview_answer_id', $interview_answers, old('interview_answer_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('interview_answer_id'))
                        <p class="help-block">
                            {{ $errors->first('interview_answer_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('interview_id', 'Interview*', ['class' => 'control-label']) !!}
                    {!! Form::select('interview_id', $interviews, old('interview_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('interview_id'))
                        <p class="help-block">
                            {{ $errors->first('interview_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

