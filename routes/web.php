<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('books', 'Admin\BooksController');
    Route::post('books_mass_destroy', ['uses' => 'Admin\BooksController@massDestroy', 'as' => 'books.mass_destroy']);
    Route::resource('interviews', 'Admin\InterviewsController');
    Route::post('interviews_mass_destroy', ['uses' => 'Admin\InterviewsController@massDestroy', 'as' => 'interviews.mass_destroy']);
    Route::resource('interview_answers', 'Admin\InterviewAnswersController');
    Route::post('interview_answers_mass_destroy', ['uses' => 'Admin\InterviewAnswersController@massDestroy', 'as' => 'interview_answers.mass_destroy']);
    Route::resource('tests', 'Admin\TestsController');
    Route::post('tests_mass_destroy', ['uses' => 'Admin\TestsController@massDestroy', 'as' => 'tests.mass_destroy']);
    Route::resource('test_answers', 'Admin\TestAnswersController');
    Route::post('test_answers_mass_destroy', ['uses' => 'Admin\TestAnswersController@massDestroy', 'as' => 'test_answers.mass_destroy']);
    Route::resource('user_test_answers', 'Admin\UserTestAnswersController');
    Route::post('user_test_answers_mass_destroy', ['uses' => 'Admin\UserTestAnswersController@massDestroy', 'as' => 'user_test_answers.mass_destroy']);
    Route::resource('user_interview_answers', 'Admin\UserInterviewAnswersController');
    Route::post('user_interview_answers_mass_destroy', ['uses' => 'Admin\UserInterviewAnswersController@massDestroy', 'as' => 'user_interview_answers.mass_destroy']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

});
