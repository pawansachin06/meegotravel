<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\SettingController;
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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login/redirect/google', [
        SocialLoginController::class, 'googleRedirect'
    ])->name('login.google');
    Route::get('/login/callback/google', [
        SocialLoginController::class, 'googleCallback'
    ]);
});

Route::get('/blog', [ArticleController::class, 'frontIndex'])->name('articles.front.index');
Route::get('/blog/category/{idOrSlug}', [ArticleCategoryController::class, 'frontShow'])->name('articles-categories.front.show');
Route::get('/blog/{idOrSlug}', [ArticleController::class, 'frontShow'])->name('articles.front.show');

Route::get('/check-usage', [PageController::class, 'check_usage'])->name('check-usage');
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs');
Route::get('/troubleshoot', [PageController::class, 'troubleshoot'])->name('troubleshoot');
Route::get('/topup', [PageController::class, 'topup'])->name('topup');


Route::get('/{countrySlug}/esim', [SimController::class, 'show'])->name('sims.show');
Route::middleware('auth')->group(function(){
    Route::get('/buy-esim-{countrySlug}-{packageId}', [
        SimController::class, 'checkout'])->name('sims.checkout');
});

// Route::resource('esims', SimController::class, [
//     'name' => 'esims'
// ]);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');
});


Route::middleware('auth.adminOrReseller')->group(function(){
    Route::get('/dashboard/overview', [UserController::class, 'overview'])->name('dashboard.overview');
    Route::get('/dashboard/esims', [UserController::class, 'esims'])->name('dashboard.esims');
    Route::get('/dashboard/support', [UserController::class, 'support'])->name('dashboard.support');
    Route::resource('/dashboard/users', UserController::class, [
        'name' => 'users'
    ]);
    Route::resource('/dashboard/withdrawals', WithdrawalController::class, [
        'name' => 'withdrawals'
    ]);
    Route::resource('/dashboard/recharges', RechargeController::class, [
        'name' => 'recharges'
    ]);
});

Route::middleware('auth.admin')->group(function(){
    Route::resource('/dashboard/articles', ArticleController::class, [
        'name' => 'articles'
    ]);
    Route::resource('/dashboard/article-categories', ArticleCategoryController::class, [
        'name' => 'article-categories'
    ]);
    Route::resource('/dashboard/settings', SettingController::class, [
        'name' => 'settings'
    ]);

    Route::get('/dashboard/switches', [SettingController::class, 'switches'])
        ->name('switches.index');
    Route::post('/dashboard/switches', [SettingController::class, 'save'])
        ->name('switches.save');
});


