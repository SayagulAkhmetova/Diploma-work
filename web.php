<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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







Route::get('/user', function() {
    return Auth::user();
});

Route::post('custom-register', function(Request $request) {
    $created = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    if ($created) {
        return response()->json(['success' => true]);
    }

});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/{any}', 'SpaController@index')->where('any', '.*');


