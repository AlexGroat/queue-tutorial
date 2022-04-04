<?php

use App\Jobs\ReconcileAccount;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Pipeline\Pipeline;

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

    $user = User::first();

    // exact same as line 26
    // dispatch(new ReconcileAccount($user));

    ReconcileAccount::dispatch($user);

    return 'Finished';
});


// Route::get('/', function () {
//     $pipeline = app(Pipeline::class);

//     $pipeline->send('hello freaking world')
//         // through array is known as PIPES
//         ->through([
//             // // parameters: accept the data, pass through next pipe
//             // function ($string, $next) {
//             //     $string = ucwords($string);

//             //     return $next($string);
//             // },

//             // function ($string, $next) {
//             //     // string replace, replace first parameter with following parameter in selected string
//             //     // case insensitive string replace
//             //     $string = str_ireplace('freaking', '', $string);

//             //     return $next($string);
//             // },

//             // last pipe
//             ReconcileAccount::class
//         ])
//         ->then(function ($string) {
//             dump($string);
//         });

//     return 'Done';
// });
