<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('books', 'BooksController');

        Route::resource('quizzes', 'QuizzesController');

        Route::resource('possible_answers', 'PossibleAnswersController');

        Route::resource('user_answers', 'UserAnswersController');

});
