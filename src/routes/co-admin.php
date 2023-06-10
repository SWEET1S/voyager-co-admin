<?php

use Illuminate\Support\Facades\Route;
use Sweet1s\VoyagerCoAdmin\Http\Controllers\VoyagerCoAdminBaseController;
use Sweet1s\VoyagerCoAdmin\Http\Controllers\VoyagerCoAdminRoleController;
use Sweet1s\VoyagerCoAdmin\Http\Controllers\VoyagerCoAdminUserController;

Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('users/relation', [VoyagerCoAdminBaseController::class, 'relation'])->name('voyager.users.relation');

    Route::put('roles/{id}', [VoyagerCoAdminRoleController::class, 'update'])->name('voyager.roles.update');
    Route::post('roles', [VoyagerCoAdminRoleController::class, 'store'])->name('voyager.roles.store');

    Route::put('users/{id}', [VoyagerCoAdminUserController::class, 'update'])->name('voyager.users.update');
});
