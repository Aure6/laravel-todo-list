<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// par défaut
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    // Lang switch
    // Route::get('/dashboard', [DashboardController::class, 'langapp'])->name('lang.switch');
    /* Route::get('/lang/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        // On redirige vers la page précédente
        return redirect()->back();
    })->middleware('locale')->name('lang.switch'); */
    Route::get('/language-switch', [DashboardController::class, 'languageSwitch'])->name('lang.switch');
    // To add a task
    Route::post('/task', [DashboardController::class, 'store'])->name('task.store');
    // To delete a task
    Route::delete('/task/{task}', [DashboardController::class, 'destroy'])->name('task.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
