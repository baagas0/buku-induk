<?php

Route::group(['middleware' => ['auth:teacher'], 'namespace' => 'Teacher', 'as' => 'teacher.'], function () {
    routeController('mapel', 'Teacher\MapelController');
    routeController('student', 'Teacher\StudentController');
    routeController('nilai', 'Teacher\NilaiController');

    routeController('profile', 'Teacher\ProfileController');

    routeController('jurnal', 'Teacher\JurnalController');

    routeController('nilai', 'Teacher\NilaiController');
    routeController('upd', 'Teacher\UpdController');
    routeController('akhlak', 'Teacher\AkhlakController');
    routeController('ketidakhadiran', 'Teacher\KetidakhadiranController');
    routeController('prestasi', 'Teacher\PrestasiController');
    routeController('kelulusan', 'Teacher\KelulusanController');
    routeController('hasil_ujian', 'Teacher\HasilUjianController');
});

Route::group(['namespace' => 'Teacher'], function () {
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
