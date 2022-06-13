<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Admin\User;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\Admin\Video as VideoLW;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;

use Illuminate\Http\Request;

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

Route::get('/', function() {
    return view('Landing.index');
});

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');


// Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('profesores', App\Http\Controllers\ProfesorController::class);
    Route::resource('estudiantes', App\Http\Controllers\EstudianteController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('videos', App\Http\Controllers\VideoController::class);
    Route::get('video', VideoLW::class);
});

if (env('APP_ENV')) {

    Route::get('go/{id}', function ($id) {
        Auth::loginUsingId($id);

        return redirect('dashboard');
    });
}

Route::middleware('auth')->group(function () {

    Route::get('livewire-users', User::class);
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});

Route::get('change-language/{language}', function ($language) {
    // dd(App::currentLocale());
    app()->setlocale($language);
    session()->put('locale', $language);

    return back();
})->name('change-language');