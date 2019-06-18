<?php

Route::group(['namespace' => 'Admin'], function() {

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    // Verify
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');

    Route::group([
        'middleware' => ['admin.auth:admin'],
        'as'         => 'admin.',
    ], function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        //prescription
        Route::group([
            'prefix' => 'prescriptions',
            'as'     => 'prescriptions.',
        ], function() {
            Route::get('/', 'PrescriptionController@index')->name('index');
            Route::get('{prescription}', 'PrescriptionController@show')->name('show');
            Route::post('{prescription}/cancel', 'PrescriptionController@cancel')->name('cancel');
        });

        //order
        Route::group([
            'prefix' => 'orders',
            'as'     => 'orders.',
        ], function() {
            Route::post('/', 'OrderController@store')->name('store');
            Route::get('{order}', 'OrderController@show')->name('show');
        });

        //medicine groups
        Route::group([
            'prefix' => 'medicine_groups',
            'as'     => 'medicine_groups.',
        ], function() {
            Route::get('/', 'MedicineGroupController@index')->name('index');
        });

        //suppliers
        Route::group([
            'prefix' => 'suppliers',
            'as'     => 'suppliers.',
        ], function() {
            Route::get('/', 'SupplierController@index')->name('index');
            Route::get('create', 'SupplierController@create')->name('create');
            Route::post('/', 'SupplierController@store')->name('store');
            Route::get('{supplier}/edit', 'SupplierController@edit')->name('edit');
            Route::put('{supplier}', 'SupplierController@update')->name('update');
            Route::delete('{supplier}', 'SupplierController@destroy')->name('delete');
        });

        //medicines
        Route::group([
            'prefix' => 'medicines',
            'as'     => 'medicines.',
        ], function() {
            Route::get('/', 'MedicineController@index')->name('index');
            Route::get('create', 'MedicineController@create')->name('create');
            Route::post('/', 'MedicineController@store')->name('store');
            Route::get('{medicine}', 'MedicineController@show')->name('show');
            Route::get('{medicine}/edit', 'MedicineController@edit')->name('edit');
            Route::put('{medicine}', 'MedicineController@update')->name('update');
            Route::delete('{medicine}', 'MedicineController@destroy')->name('delete');
        });
    });
});
