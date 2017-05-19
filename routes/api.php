<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('books', 'BooksController');

        Route::post('answer/{possibleAnswer}', 'UserAnswersController@postAnswer');

});
