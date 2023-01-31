<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/saman' , [\App\Http\Controllers\AdminTourController::class,'testApi']);
Route::get('/jsontour' , [\App\Http\Controllers\AdminTourController::class, 'jsonTours']);
Route::get('/tst2' , [\App\Http\Controllers\AdminTourController::class,'tst2']);

Route::middleware('auth:api')->group( function (){

    Route::get('/testlogin' , function (Request $request){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            if (! auth()->attempt($validator->validated())) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return 'hi';
        /*$validated = $this->validate($request, [
           'email' => 'required',
            'password' => 'required'
        ]);
        if (! auth()->attempt($validated)){
            return 'not ok';
        }
        else{
            return 'ok';
        }*/
    });
});



#################  test api #######################
Route::get('users',[\App\Http\Controllers\TestController::class,'getUsers']);
