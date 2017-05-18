<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('interviews', 'InterviewsController');

        Route::resource('interview_answers', 'InterviewAnswersController');

        Route::resource('tests', 'TestsController');

        Route::resource('test_answers', 'TestAnswersController');

        Route::resource('user_test_answers', 'UserTestAnswersController');

        Route::resource('user_interview_answers', 'UserInterviewAnswersController');

});
