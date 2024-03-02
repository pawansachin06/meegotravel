<?php

use App\Http\Controllers\SimController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.index');
})->name('home');

Route::get('/blog', function(){
    $breadcrumbs = [ ['name'=> 'Blog', 'link'=> '/blog'] ];
    return view('articles.index', ['breadcrumbs' => $breadcrumbs]);
})->name('articles.index');

Route::get('/check-usage', [PageController::class, 'check_usage'])->name('check-usage');
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs');
Route::get('/troubleshoot', [PageController::class, 'troubleshoot'])->name('troubleshoot');
Route::get('/topup', [PageController::class, 'topup'])->name('topup');


Route::get('/esim', function(){
    return view('sims.view');
});

// Route::resource('esims', SimController::class, [
//     'name' => 'esims'
// ]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
