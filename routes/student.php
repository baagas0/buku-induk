<?php

Route::group(['namespace' => 'Student'], function() {
    // Dashboard
    Route::get('/', 'HomeController@index')->name('student.home');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('student.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('student.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('student.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('student.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('student.password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('student.password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Verify Email
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('student.verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('student.verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('student.verification.resend');
});
