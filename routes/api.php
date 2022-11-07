<?php

use Illuminate\Http\Request;
use Illuminate\Tests\Support\C;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;    
use App\Http\Controllers\PassportAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::group(['middleware'=>['auth:api']],function(){
    Route::post('logout', [PassportAuthController::class, 'logout']);    
});


Route::middleware('auth:api')->group(function() {
    Route::resource('posts', PostController::class);

});
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
