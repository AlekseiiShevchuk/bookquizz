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
    Route::resource('quizzes', 'Admin\QuizzesController');
    Route::post('quizzes_mass_destroy', ['uses' => 'Admin\QuizzesController@massDestroy', 'as' => 'quizzes.mass_destroy']);
    Route::resource('possible_answers', 'Admin\PossibleAnswersController');
    Route::post('possible_answers_mass_destroy', ['uses' => 'Admin\PossibleAnswersController@massDestroy', 'as' => 'possible_answers.mass_destroy']);
    Route::resource('user_answers', 'Admin\UserAnswersController');
    Route::post('user_answers_mass_destroy', ['uses' => 'Admin\UserAnswersController@massDestroy', 'as' => 'user_answers.mass_destroy']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

});
