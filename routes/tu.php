<?php

Route::group(['namespace' => 'Tu'], function() {
    // Dashboard
    Route::get('/', 'HomeController@index')->name('tu.home');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('tu.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('tu.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('tu.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('tu.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('tu.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('tu.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('tu.password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('tu.password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Verify Email
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('tu.verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('tu.verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('tu.verification.resend');
});
