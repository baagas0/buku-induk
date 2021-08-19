<?php

Route::group(['middleware' => ['auth:teacher'],'namespace' => 'Teacher', 'as' => 'teacher.'], function() {
    routeController('mapel', 'teacher\MapelController');
    routeController('student', 'teacher\StudentController');
    routeController('nilai', 'teacher\NilaiController');

    routeController('nilai', 'teacher\NilaiController');
    routeController('upd', 'teacher\UpdController');
    routeController('akhlak', 'teacher\AkhlakController');
    routeController('ketidakhadiran', 'teacher\KetidakhadiranController');
    routeController('prestasi', 'teacher\PrestasiController');
    routeController('kelulusan', 'teacher\KelulusanController');
    routeController('hasil_ujian', 'teacher\HasilUjianController');

});

Route::group(['namespace' => 'Teacher'], function() {
    // Dashboard
    Route::get('/', 'HomeController@index')->name('teacher.home');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('teacher.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('teacher.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('teacher.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('teacher.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('teacher.password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('teacher.password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Verify Email
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('teacher.verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('teacher.verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('teacher.verification.resend');
});
