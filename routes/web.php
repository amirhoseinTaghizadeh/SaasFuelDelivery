<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    $user = Auth::user();
    if ($user) {
        $companyUrl = $user->company->url;
        return redirect()->to($companyUrl);
    } else {
        return redirect()->route('home');
    }
})->name('home');

Route::middleware(['auth', 'EnsureValidTenantSession'])->group(function () {

    $user = Auth::user();

    if ($user && $user->company) {
        $companyName = $user->company->name;

        Route::group(['prefix' => $companyName], function () {

            Route::group(['prefix' => 'orders'], function () {
                Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index')->middleware('permission:view-orders');

                Route::get('/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show')->middleware('permission:view-orders');

                Route::get('/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('orders.create')->middleware('permission:create-orders');
                Route::post('/', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store')->middleware('permission:create-orders');

                Route::get('/{order}/edit', [\App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit')->middleware('permission:update-orders');
                Route::put('/{order}', [\App\Http\Controllers\OrderController::class, 'update'])->name('orders.update')->middleware('permission:update-orders');

                Route::delete('/{order}', [\App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy')->middleware('permission:delete-orders');
            });

            Route::group(['prefix' => 'trucks'], function () {
                Route::get('/', [\App\Http\Controllers\TruckController::class, 'index'])->name('trucks.index')->middleware('permission:view-trucks');

                Route::get('/{truck}', [\App\Http\Controllers\TruckController::class, 'show'])->name('truck.show')->middleware('permission:view-trucks');

                Route::get('/create', [\App\Http\Controllers\TruckController::class, 'create'])->name('trucks.create')->middleware('permission:create-trucks');
                Route::post('/', [\App\Http\Controllers\TruckController::class, 'store'])->name('trucks.store')->middleware('permission:create-trucks');

                Route::get('/{truck}/edit', [\App\Http\Controllers\TruckController::class, 'edit'])->name('trucks.edit')->middleware('permission:update-trucks');
                Route::put('/{truck}', [\App\Http\Controllers\TruckController::class, 'update'])->name('trucks.update')->middleware('permission:update-trucks');

                Route::delete('/{truck}', [\App\Http\Controllers\TruckController::class, 'destroy'])->name('trucks.destroy')->middleware('permission:delete-trucks');
            });
            Route::group(['prefix' => 'users'], function () {
                Route::get('users', [\App\Models\Users::class, 'index'])->middleware('permission:view users');
                Route::get('users/create', [\App\Models\Users::class, 'create'])->middleware('permission:create users');
                Route::post('users', [\App\Models\Users::class, 'store'])->middleware('permission:create users');
                Route::get('users/{user}/edit', [\App\Models\Users::class, 'edit'])->middleware('permission:edit users');
                Route::put('users/{user}', [\App\Models\Users::class, 'update'])->middleware('permission:edit users');
                Route::delete('users/{user}', [\App\Models\Users::class, 'destroy'])->middleware('permission:delete users');
            });

        });
    }
});

Route::group(['prefix' => 'companies', 'middleware' => 'access-companies'], function () {

    Route::get('/', [\App\Http\Controllers\CompaniesController::class, 'index'])->name('companies.index')->middleware('permission:view-companies');

    Route::get('/{company}', [\App\Http\Controllers\CompaniesController::class, 'show'])->name('companies.show')->middleware('permission:view-companies');

    Route::get('/create', [\App\Http\Controllers\CompaniesController::class, 'create'])->name('companies.create')->middleware('permission:create-companies');
    Route::post('/', [\App\Http\Controllers\CompaniesController::class, 'store'])->name('companies.store')->middleware('permission:create-companies');

    Route::get('/{company}/edit', [\App\Http\Controllers\CompaniesController::class, 'edit'])->name('companies.edit')->middleware('permission:update-companies');
    Route::put('/{company}', [\App\Http\Controllers\CompaniesController::class, 'update'])->name('companies.update')->middleware('permission:update-companies');

    Route::delete('/{company}', [\App\Http\Controllers\CompaniesController::class, 'destroy'])->name('companies.destroy')->middleware('permission:delete-companies');
});



