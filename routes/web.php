<?php
namespace App\Http\Controllers;
// use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('client.dashClient');
})->middleware('auth');
Route::get('/',[HomeController::class , 'index'])->name('dash')->middleware('auth');

//register
Route::get('/register',[AuthController::class , 'register'])->name('register');
Route::post('/register',[AuthController::class , 'store']);
//login
Route::get('/login',[AuthController::class , 'login'])->name('login');
Route::post('/login',[AuthController::class , 'authenticate']);

//grouping routages Tikcet
Route::group(['prefix' => 'Ticket/','as' => 'Ticket.','middleware' => 'auth'], function(){
    Route::get('/', [TicketController::class, 'index'])->name('index');
    Route::get('/create', [TicketController::class, 'create'])->name('form');
    Route::post('/create/{user}', [TicketController::class, 'store'])->name('create');
    Route::get('/{id}', [TicketController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TicketController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TicketController::class, 'update'])->name('update');
    Route::delete('/{id}', [TicketController::class, 'destroy'])->name('delete');
    // Route::post('/{id}/reponses', [ReponseController::class, 'store'])->name('reponsestore');
});
