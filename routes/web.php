<?php

use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

//Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'isadmin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
