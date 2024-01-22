<?php

declare (strict_types = 1);

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get(
    uri : '/',
    action : [EmployeeController::class, 'index']
)->name('employee.index');

Route::get(
    uri : '/{id}',
    action : [EmployeeController::class, 'show']
)->name('employee.show');

Route::post(
    uri : '/',
    action : [EmployeeController::class, 'create']
)->name('employee.create');

Route::delete(
    uri : '/{id}',
    action : [EmployeeController::class, 'delete']
)->name('employee.delete');

Route::put(
    uri : '/{id}',
    action : [EmployeeController::class, 'update']
)->name('employee.update.put');

Route::patch(
    uri : '/{id}',
    action : [EmployeeController::class, 'update_one']
)->name('employee.update.patch');