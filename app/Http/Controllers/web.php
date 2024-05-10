<?php

use App\Http\Controllers\Users;
use App\Http\Controllers\Campagne;
use App\Http\Controllers\Candidature;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoixController;

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
Route::get('/',[Campagne::class, 'index']);

Route::get('/candidature/{campagne}',[Candidature::class, 'index']);
Route::get('/candidature/choixreg/{reg}', [ChoixController::class,'choixReg']);
Route::get('/candidature/choixdept/{dept}',[ChoixController::class,'choixDept']);
Route::get('/candidature/choixcomm/{comm}', [ChoixController::class,'choixComm']);
Route::post('/candidature/{campagne}/store',[Candidature::class, 'store']);
Route::get('admin/campagne/candidats/{id}',[Candidature::class,'show']);

Route::middleware(['myAuth'])->group(function(){

Route::get('/admin',[Campagne::class, 'show']);
Route::post('admin/campagne/new',[Campagne::class, 'store']);
Route::get('admin/campagne/edit/{id}',[Campagne::class,'edit']);
Route::post('admin/campagne/update/{id}',[Campagne::class,'update']);
Route::get('admin/campagne/delete/{id}',[Campagne::class,'delete']);

Route::get('/admin/candidature/{id}',[Candidature::class, 'delete']);

Route::get('/admin/candidature/edit/{id}',[Candidature::class, 'edit']);
Route::post('/admin/candidature/maj/{id}',[Candidature::class, 'update']);




Route::get('admin/users',[Users::class, 'index'] );
Route::post('admin/users/create',[Users::class, 'create'] );
Route::get('admin/users/edit/{id}',[Users::class, 'edit'] );
Route::get('admin/users/update/{id}',[Users::class, 'update'] );
Route::get('admin/users/del/{id}',[Users::class, 'delete'] );

Route::post('/logout',function(){

    cas()->logout();
    return redirect('htpps://auth.mlouma.com/cas/logout');
});
});

