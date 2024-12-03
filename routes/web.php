<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\TopicsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//Route::get('/admin',function(){
//return view ('admin.index');
//})->middleware(['auth','role:admin'])->name('admin.index');  



Route::middleware(['auth', 'role:Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::resource('/roles', RolesController::class);

    Route::resource('/permissions', PermissionsController::class);

    Route::resource('/users', UsersController::class);

    Route::resource('/topics', TopicsController::class);



    Route::post('/users/roles', [UsersController::class, 'assignRole']);


    Route::post('/subscriber', StoreController::class)->name('subscribe');


    Route::get('/admin/topics', [NewsletterController::class, 'store']);
    Route::get('/admin/topics', [MailController::class, 'subscribe'])->name('admin.topics.subscribe');


    Route::post('/admin/permissions', [RolesController::class, 'update'])->name('admin.permissions.roles');
    Route::get('/admin/permissions', [RolesController::class, 'edit'])->name('admin.permissions.roles');
    Route::post('/admin/roles', [PermissionsController::class, 'update'])->name('admin.permissions.roles');
    Route::get('/admin/roles', [PermissionsController::class, 'edit'])->name('admin.permissions.roles');
});


Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/permissions/{permission}/roles', [PermissionsController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionsController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::post('/roles/{role}/permissions', [RolesController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RolesController::class, 'revokePermission'])->name('roles.permissions.revoke');


    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UsersController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UsersController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UsersController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UsersController::class, 'revokePermission'])->name('users.permissions.revoke');
});

require __DIR__.'/auth.php';
