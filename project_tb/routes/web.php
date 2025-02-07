<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKurirController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use App\Models\Courier;
use App\Models\Tracking;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/', function (Request $request) {
    if ($request->search) {
        $trackings = Tracking::filter(request(['search']))->get();
    } else{
        $trackings = str('');
    }
    return view('welcome', compact('trackings'));
});

Route::get('/dashboard', [CourierController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/kurir/dashboard', [CourierController::class, 'index'])->name('courier');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('admin')->name('admin');
    Route::get('/admin/tracking', [TrackingController::class, 'index'])->middleware('admin')->name('admin.tracking');
    Route::get('/admin/tracking/create', [TrackingController::class, 'create'])->middleware('admin')->name('admin.tracking.create');
    Route::post('/admin/tracking/store', [TrackingController::class, 'store'])->middleware('admin')->name('admin.tracking.store');
    Route::get('/admin/tracking/edit/{tracking}', [TrackingController::class, 'edit'])->middleware('admin')->name('admin.tracking.edit');
    Route::put('/admin/tracking/{tracking}', [TrackingController::class, 'update'])->middleware('admin')->name('admin.tracking.update');
    Route::delete('/admin/tracking/{tracking}', [TrackingController::class, 'destroy'])->middleware('admin')->name('admin.tracking.destroy');
    Route::get('/admin/kurir', [AdminKurirController::class, 'index'])->middleware('admin')->name('admin.kurir');
    Route::get('/admin/kurir/create', [AdminKurirController::class, 'create'])->middleware('admin')->name('admin.kurir.create');
    Route::post('/admin/kurir/', [AdminKurirController::class, 'store'])->middleware('admin')->name('admin.kurir.store');
    Route::get('/admin/kurir/edit/{courier}', [AdminKurirController::class, 'edit'])->middleware('admin')->name('admin.kurir.edit');
    Route::put('/admin/kurir/{courier}', [AdminKurirController::class, 'update'])->middleware('admin')->name('admin.kurir.update');
    Route::delete('/admin/kurir/{courier}', [AdminKurirController::class, 'destroy'])->middleware('admin')->name('admin.kurir.destroy');
    Route::put('/dashboard/{courier}', [CourierController::class, 'update'])->name('kurir.update');
    Route::get('/dashboard/update/{courier}', [CourierController::class, 'edit'])->name('kurir.edit');

});

require __DIR__.'/auth.php';
