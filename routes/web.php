<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ComplaitController;
    use App\Http\Controllers\RegisterUserController;
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
        return view('index');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::controller(ComplaitController::class)->group(function () {
        Route::get('complaits', 'index');
        Route::post('store', 'store')->name('store');
        Route::post('update_complait/{id}', 'update_complait')->name('update_complait');
        Route::get('view_complaint/{id}', 'view_complaint')->name('view_complaint');
        Route::post('destroy_complait/{id}', 'destroy_complait')->name('destroy_complait');
    })->middleware('auth');

    // ukipata changamoto kuelewa hapo nichek

    // destroy inafanya kaz ya kudelete complait
    // show inafanya kaz ya kuonesha complait fulan yaani view
    // update inafanya kaz ya ku-update status complait fulan kumak kama imesolvia tyr au bado
    // complaits inafanya kaz ya kuretrive complait zote na kuzionesha ktk page ya complaits

    // UKITAKA KUELEWA HOW ZNAFANYA KAZI CHECK ComplaitController IPO NDAN YA app/http/controllers baada ya controller kufanya hizo kaz inatuma majibu kwenda resources/view/complaits
    // kaz ya model n kutuma taarifa na kutoa data, kutuma taarfa how yaani kusubmit(store), view(show), update and delete

    //  uktaka kufanya changez ya design deal na file hili resources/view/ ukitaka fanya changes za logic au manupulations kutoka kwenye database deal na model, view, controller and routes

    Route::controller(RegisterUserController::class)->group(function () {
        Route::get('users', 'index');
        Route::get('auth/register', 'register')->name('auth/register');
        Route::post('/auth/store', 'store')->name('/auth/store');
        Route::get('view_user/{id}', 'view_user')->name('view_user');
        Route::get('edit_user/{id}', 'edit_user')->name('edit_user');
        Route::post('update_edit_user', 'update_edit_user')->name('update_edit_user');
        Route::post('destroy_user/{id}', 'destroy_user')->name('destroy_user');
    })->middleware('auth');
