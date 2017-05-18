@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-test-answers.title')</h3>
    
    {!! Form::model($user_test_answer, ['method' => 'PUT', 'route' => ['admin.user_test_answers.update', $user_test_answer->id]]) !!}

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
                    {!! Form::label('test_answer_id', 'Test answer*', ['class' => 'control-label']) !!}
                    {!! Form::select('test_answer_id', $test_answers, old('test_answer_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test_answer_id'))
                        <p class="help-block">
                            {{ $errors->first('test_answer_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('test_id', 'Test*', ['class' => 'control-label']) !!}
                    {!! Form::select('test_id', $tests, old('test_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test_id'))
                        <p class="help-block">
                            {{ $errors->first('test_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

