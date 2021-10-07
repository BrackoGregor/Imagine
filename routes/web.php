<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;
use App\Models\Api;


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
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
});


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->scopes(['read:user', 'repo'])->redirect();
});

Route::get('/auth/callback', [GitHubController::class, 'getRepositories']);

Route::get('/issues/{user}/{repository}/{token}', [GitHubController::class, 'getRepositoryIssues']);

Route::get('/logout', function(){

    Auth::guard('admin')->logout();
    $request->session()->flush();
    $request->session()->regenerate();
    return redirect()->guest(route( '/' ));
});

