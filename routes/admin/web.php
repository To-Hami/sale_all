<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\SourceController;
use Spatie\Activitylog\Models\Activity;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath',
        'auth',
//        'role:admin|super_admin',
    ]


], function () {
        Route::name('admin.')->prefix('admin')->group(function(){


            //home
            Route::get('/home',[HomeController::class,'index'])->name('home');

           //clients
           Route::get('/clients/data', [ClientController::class,'data'])->name('clients.data');
           Route::get('/clients/activity', [ClientController::class,'activity'])->name('clients.activity');
           Route::get('/clients/restore/{client}/restrore', [ClientController::class,'restore'])->name('clients.restore');
           Route::get('/clients/archive', [ClientController::class,'archive'])->name('clients.archive');
           Route::delete('/clients/bulk_delete', [ClientController::class,'bulkDelete'])->name('clients.bulk_delete');
           Route::resource('clients', ClientController::class);

            //sources
            Route::get('/sources/data', [SourceController::class,'data'])->name('sources.data');
            Route::get('/sources/restrore/{source}', [SourceController::class,'restore'])->name('sources.restore');
            Route::get('/sources/archive', [SourceController::class,'archive'])->name('sources.archive');
            Route::delete('/sources/bulk_delete', [SourceController::class,'bulkDelete'])->name('sources.bulk_delete');
            Route::resource('sources', SourceController::class);

//activity

            // Route::get('/activity', function(){
            //     return Activity::all();
            // });


        });
    });

