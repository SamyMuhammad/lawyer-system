<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){ return redirect()->route('dashboard'); });
Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->namespace('App\Http\Controllers')->group(function () {
    Route::get('issue/search', [App\Http\Controllers\IssueController::class, 'search'])->name('issue.search');
    Route::get('expert-issue/date-range', [App\Http\Controllers\ExpertIssueController::class, 'dateRange'])->name('expert-issue.dateRange');
    Route::get('session-roll/date-range', [App\Http\Controllers\SessionRollController::class, 'dateRange'])->name('session-roll.dateRange');
    Route::resources([
        'user' => UserController::class,
        'issue' => IssueController::class,
        'client' => ClientController::class,
        'receipt-voucher' => ReceiptVoucherController::class,
        'expert-issue' => ExpertIssueController::class,
        'session-roll' => SessionRollController::class,
    ]);
});

Route::get('clear_cache', function () {
    $x = Artisan::call('cache:clear');
    $x = Artisan::call('view:clear');
    $x = Artisan::call('config:clear');
    $x = Artisan::call('config:cache');
    return "Done!";
});
Route::get('_migrate', function(){
    $exitCode = Artisan::call('migrate:fresh', [
        '--seed' => true,
    ]);
    return "Done!";
});
// Route::get('_route', function(){ return "Done"; });
Route::fallback(function(){ return redirect()->route('dashboard'); });