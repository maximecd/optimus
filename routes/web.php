<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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




/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {

    //Comptes
    Route::get('/', function () {
        return view('compte/index');
    })->name('compte.index');

    // Transactions
    Route::resource('transaction', TransactionController::class);

});
