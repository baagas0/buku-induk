<?php

Route::group(['middleware' => ['auth:master'],'namespace' => 'Master', 'as' => 'master.'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    routeController('mapel', 'Master\MapelController');
    routeController('student', 'Master\StudentController');

    routeController('kelulusan', 'Master\KelulusanController');
    routeController('hasil_ujian', 'Master\HasilUjianController');

    routeController('e-rapor', 'Master\EraporController');

    routeController('setting', 'Master\SettingController');

    Route::group(['namespace' => 'Pengguna', 'as' => 'user.'], function() {
        routeController('teacher', 'Master\Pengguna\TeacherController');
        routeController('master', 'Master\Pengguna\MasterController');
        routeController('kelas', 'Master\Pengguna\KelasController');
    });
});

Route::group(['namespace' => 'Master'], function() {
    // Dashboard

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('master.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('master.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('master.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('master.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('master.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('master.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('master.password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('master.password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Verify Email
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('master.verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('master.verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('master.verification.resend');
});
