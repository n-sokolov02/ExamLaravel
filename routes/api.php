<?php

use App\Http\Api\v1\Controllers\OfficeController\OfficeCommandController;
use App\Http\Api\v1\Controllers\OfficeController\OfficeQueryController;
use App\Http\Api\v1\Controllers\WorkerController\WorkerCommandController;
use App\Http\Api\v1\Controllers\WorkerController\WorkerQueryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    Route::get('v1/office', [OfficeQueryController::class, 'indexOffice']);
    Route::get('v1/office/{id}', [OfficeQueryController::class, 'viewOffice']);
    Route::post('v1/office', [OfficeCommandController::class, 'createOffice']);
    Route::put('v1/office/{id}', [OfficeCommandController::class, 'updateOffice']);
    Route::delete('v1/office/{id}', [OfficeCommandController::class, 'deleteOffice']);

    Route::get('v1/worker', [WorkerQueryController::class, 'indexWorker']);
    Route::get('v1/worker/{id}', [WorkerQueryController::class, 'viewWorker']);
    Route::post('v1/worker', [WorkerCommandController::class, 'createWorker']);
    Route::put('v1/worker/{id}', [WorkerCommandController::class, 'updateWorker']);
    Route::delete('v1/worker/{id}', [WorkerCommandController::class, 'deleteWorker']);


