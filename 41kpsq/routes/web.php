<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VillagesController;
use App\Models\Admin;
use App\Models\Members;
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
Route::get('/',[FrontController::class,'indexdata']);

Route::get('/member/userDash', function () {
    return view('userDash');
});

Route::get('/member/userDash',[FrontController::class,'index']);

Route::get('/register',[FrontController::class,'registration']);
Route::get('/forgotpassword',[FrontController::class,'forgot']);
Route::get('/loginuser',[FrontController::class,'login']);
Route::post('registration_proccess',[FrontController::class,'registration_proccess'])->name('registration.registration_proccess');
Route::post('login_process',[FrontController::class,'login_process'])->name('login.login_process');
Route::get('admin',[AdminController::class,'index']);
Route::post('forgotpassword',[FrontController::class,'forgot_password']);
Route::get('/forgot_password_change/{id}',[FrontController::class,'forgot_password_change']);
Route::post('forgot_password_change_process',[FrontController::class,'forgot_password_change_process']);

Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');


Route::get('/logoutuser', function () {
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    return redirect('/');   
   return view('welcome');
});
/************************************************************************************************ */
Route::get('/verification/{id}',[FrontController::class,'email_verification']);

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

Route::get('admin/gallery',[GalleryController::class,'index']);
Route::post('admin/gallery_load',[FrontController::class,'gallery_load'])->name('gallery.gallery_load');
Route::get('admin/gallery/delete/{id}',[GalleryController::class,'delete']);
Route::post('admin/gallery/add',[GalleryController::class,'add'])->name('gallery.add');

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

    /************************************************************************************************ */
    
    Route::get('regmember',[FrontController::class,'registration']);
    Route::post('member/account/add',[MembersController::class,'add'])->name('member.add');
    Route::get('member/event',[MembersController::class,'eventlist']);
    Route::get('member/ticket',[MembersController::class,'ticket']);
    Route::get('member/account/{id}',[MembersController::class,'account']);
});
