<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
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

// Registration Routes..
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

Route::group(['middleware' => ['auth', 'approved'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('guias', 'Admin\GuiasController');
    Route::post('guias_mass_destroy', ['uses' => 'Admin\GuiasController@massDestroy', 'as' => 'guias.mass_destroy']);
    Route::post('guias_restore/{id}', ['uses' => 'Admin\GuiasController@restore', 'as' => 'guias.restore']);
    Route::delete('guias_perma_del/{id}', ['uses' => 'Admin\GuiasController@perma_del', 'as' => 'guias.perma_del']);
    Route::resource('clientes', 'Admin\ClientesController');
    Route::post('clientes_mass_destroy', ['uses' => 'Admin\ClientesController@massDestroy', 'as' => 'clientes.mass_destroy']);
    Route::post('clientes_restore/{id}', ['uses' => 'Admin\ClientesController@restore', 'as' => 'clientes.restore']);
    Route::delete('clientes_perma_del/{id}', ['uses' => 'Admin\ClientesController@perma_del', 'as' => 'clientes.perma_del']);
    Route::resource('relatorios', 'Admin\RelatoriosController');
    Route::post('relatorios_mass_destroy', ['uses' => 'Admin\RelatoriosController@massDestroy', 'as' => 'relatorios.mass_destroy']);
    Route::post('relatorios_restore/{id}', ['uses' => 'Admin\RelatoriosController@restore', 'as' => 'relatorios.restore']);
    Route::delete('relatorios_perma_del/{id}', ['uses' => 'Admin\RelatoriosController@perma_del', 'as' => 'relatorios.perma_del']);
    Route::resource('medicos', 'Admin\MedicosController');
    Route::post('medicos_mass_destroy', ['uses' => 'Admin\MedicosController@massDestroy', 'as' => 'medicos.mass_destroy']);
    Route::post('medicos_restore/{id}', ['uses' => 'Admin\MedicosController@restore', 'as' => 'medicos.restore']);
    Route::delete('medicos_perma_del/{id}', ['uses' => 'Admin\MedicosController@perma_del', 'as' => 'medicos.perma_del']);
    Route::resource('convenios', 'Admin\ConveniosController');
    Route::post('convenios_mass_destroy', ['uses' => 'Admin\ConveniosController@massDestroy', 'as' => 'convenios.mass_destroy']);
    Route::post('convenios_restore/{id}', ['uses' => 'Admin\ConveniosController@restore', 'as' => 'convenios.restore']);
    Route::delete('convenios_perma_del/{id}', ['uses' => 'Admin\ConveniosController@perma_del', 'as' => 'convenios.perma_del']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::get('internal_notifications/read', 'Admin\InternalNotificationsController@read');
    Route::resource('internal_notifications', 'Admin\InternalNotificationsController');
    Route::post('internal_notifications_mass_destroy', ['uses' => 'Admin\InternalNotificationsController@massDestroy', 'as' => 'internal_notifications.mass_destroy']);
    Route::resource('teams', 'Admin\TeamsController');
    Route::post('teams_mass_destroy', ['uses' => 'Admin\TeamsController@massDestroy', 'as' => 'teams.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');



    Route::get('search', 'MegaSearchController@search')->name('mega-search');
});
