<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CompteController;
use App\Http\Middleware\CheckAccountAccess;

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

Route::group(['middleware' => [CheckAccountAccess::class]], function () {

    //Comptes
    Route::get('/', [CompteController::class, 'index'])->name('compte.index');
    Route::get('compte/create', [CompteController::class, 'create'])->name('compte.create');
    Route::post('compte/create', [CompteController::class, 'store'])->name('compte.store');
    Route::get('compte/{id}', [CompteController::class, 'show'])->name('compte.dashboard');
    Route::get('compte/{id}/edit', [CompteController::class, 'edit'])->name('compte.edit');
    Route::put('compte/{id}/edit', [CompteController::class, 'update'])->name('compte.update');

    Route::delete('compte/{id}/delete', [CompteController::class, 'destroy'])->name('compte.destroy');

    Route::put('compte/{id}/invite', [CompteController::class, 'invite'])->name('compte.invite');
    Route::delete('invite/{id}/decline', [CompteController::class, 'declineInvite'])->name('invite.decline');
    Route::put('invite/{id}/accept', [CompteController::class, 'acceptInvite'])->name('invite.accept');

    //ajouter route pour créer un compte
 




//    Route::resource('compte', CompteController::class);



    // Transactions
    Route::get('compte/{id}/transaction/ajouter', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('compte/{id}/transaction/ajouter', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('compte/{id}/transaction/{id_transaction}/editer', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('compte/{id}/transaction/{id_transaction}/editer', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('compte/{id}/transaction/{id_transaction}/supprimer', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::get('compte/{id}/transaction/{id_transaction}/voir', [TransactionController::class, 'show'])->name('transaction.show');
});
