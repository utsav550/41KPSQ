<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VillagesController;
use App\Models\Admin;
use App\Models\villages;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::post('admin/events/add',[EventsController::class,'add'])->name('event.add');
    Route::get('admin/events',[EventsController::class,'index']); 
    Route::get('admin/events/add_event',[EventsController::class,'add_event']);
    Route::get('admin/events/add_event/{id}',[EventsController::class,'add_event'])->name('event.manage');
    Route::get('admin/events/delete/{id}',[EventsController::class,'delete']);

//************************************************************************** */



Route::get('admin/ticket',[TicketController::class,'index']);

    Route::get('admin/ticket/manage_ticket',[TicketController::class,'manage_ticket']);
    Route::get('admin/ticket/manage_ticket/{id}',[TicketController::class,'manage_ticket']);
    Route::post('admin/ticket/manage_ticket_process',[TicketController::class,'manage_ticket_process'])->name('ticket.manage_ticket_process');
    Route::get('admin/ticket/delete/{id}',[TicketController::class,'delete']);
    Route::get('admin/ticket/status/{id}',[TicketController::class,'status']);

//************************************************************************** */



Route::get('admin/village',[VillagesController::class,'index']);
Route::post('admin/village/addvillage',[VillagesController::class,'addv'])->name('addvillage.addv');
Route::get('admin/village/add',[VillagesController::class,'add'])->name('village.add');
    Route::get('admin/village/manage_village/{id}',[VillagesController::class,'add']);
    Route::post('admin/village/manage_ticket_process',[VillagesController::class,'manage_village_process'])->name('village.manage_ticket_process');
    Route::get('admin/village/delete/{id}',[VillagesController::class,'delete']);
    Route::get('admin/village/status/{id}',[VillagesController::class,'status']);


/************************************************************************************************ */
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('admin');    
        return view('welcome');
    });
    
    
});
