<?php

use App\Http\Controllers\Contact\CreateContactController;
use App\Http\Controllers\Contact\DeleteContactController;
use App\Http\Controllers\Contact\GetAllContactsController;
use App\Http\Controllers\Contact\GetContactByIdController;
use App\Http\Controllers\Contact\UpdateContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    'api/v1/notebook',
    [GetAllContactsController::class, 'getAll']
)->name('api.contacts.getAll');

Route::post(
    'api/v1/notebook',
    [CreateContactController::class, 'create']
)->name('api.contacts.create');

Route::get(
    'api/v1/notebook/{id}',
    [GetContactByIdController::class, 'getById']
)->name('api.contacts.getById');

Route::post(
    'api/v1/notebook/{id}',
    [UpdateContactController::class, 'update']
)->name('api.contacts.update');

Route::delete(
    'api/v1/notebook/{id}',
    [DeleteContactController::class, 'delete']
)->name('api.contacts.delete');
