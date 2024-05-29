<?php

Route::get('/', 'PosbeasiswaController@index');
Route::get('/beasiswa/{id}', 'PosbeasiswaController@show')->name('beasiswa.show');
Route::get('/beasiswa/{id}/daftar', 'PendaftaranController@create')->name('pendaftaran.create');
Route::post('/beasiswa/{id}/daftar', 'PendaftaranController@store')->name('pendaftaran.store');

Route::redirect('/loginadmin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Sosial Media
    Route::delete('sosial-media/destroy', 'SosialMediaController@massDestroy')->name('sosial-media.massDestroy');
    Route::resource('sosial-media', 'SosialMediaController');

    // Beasiswa
    Route::delete('beasiswas/destroy', 'BeasiswaController@massDestroy')->name('beasiswas.massDestroy');
    Route::post('beasiswas/media', 'BeasiswaController@storeMedia')->name('beasiswas.storeMedia');
    Route::post('beasiswas/ckmedia', 'BeasiswaController@storeCKEditorImages')->name('beasiswas.storeCKEditorImages');
    Route::resource('beasiswas', 'BeasiswaController');

    // Pendaftaran
    Route::delete('pendaftarans/destroy', 'PendaftaranController@massDestroy')->name('pendaftarans.massDestroy');
    Route::resource('pendaftarans', 'PendaftaranController');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
