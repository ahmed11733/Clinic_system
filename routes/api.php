<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userapicontroller;
use App\Http\Controllers\drapicontroller;



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


Route::group([

    ['middleware'=>'auth:api'] ,

    'prefix' => 'auth'



], function($router){


    Route::post('userLogin',[userapicontroller::class,'userLogin']);
    Route::post('userRegister',[userapicontroller::class,'userRegister']);
    Route::post('userlogout',[userapicontroller::class,'logout']);



    Route::get('showDoctors',[userapicontroller::class,'showDoctors']);
    
    Route::post('/profile/{id}',[userapicontroller::class,'doctorProfile']);
    
    Route::post('/select/{id}',[userapicontroller::class,'selectDoctor']);


    Route::get('/showTreatments',[userapicontroller::class,'showTreatments']);

    Route::post('/addMedicalHistory',[userapicontroller::class,'addMedicalHistory']);
    Route::get('/getMedicalHistory',[userapicontroller::class,'getMedicalHistory']);

        
    Route::post('/createReview/{id}',[userapicontroller::class,'createReview']);
    Route::get('/showReviews/{id}',[userapicontroller::class,'showReviews']);




    Route::get('/bookedAppointments',[userapicontroller::class,'bookedAppointments']);
    Route::post('/cancelAppointment/{id}',[userapicontroller::class,'cancelAppointment']);



    Route::get('userProfile',[userapicontroller::class,'userProfile']);
    Route::get('/user/editProfile/{id}',[userapicontroller::class,'editProfile']);


    Route::post('/user/updateProfile/{id}',[userapicontroller::class,'updateProfile']);



});



Route::group([

    ['middleware'=>'auth:doc_api'] ,

    'prefix' => 'auth'



], function($router){

    Route::post('doctorLogin',[drapicontroller::class,'doctorLogin']);
    Route::post('doctorRegister',[drapicontroller::class,'doctorRegister']);


    Route::post('logout',[drapicontroller::class,'logout']);


    Route::get('getPatients',[drapicontroller::class,'getPatients']);

    Route::get('/patientMedicalHistoryData',[drapicontroller::class,'patientMedicalHistoryData']);


    Route::post('addTreatment',[drapicontroller::class,'addTreatment']);
    Route::get('/showTreatmentsDoctor',[drapicontroller::class,'showTreatments']);

    Route::get('profile',[drapicontroller::class,'profile']);
    Route::get('/doctor/editProfile/{id}',[drapicontroller::class,'editProfile']);
    Route::post('/doctor/updateProfile/{id}',[drapicontroller::class,'updateProfile']);


    Route::post('/setWorkingTime',[drapicontroller::class,'setWorkingTime']);
    Route::get('/editWorkingTimePage/{id}',[drapicontroller::class,'editWorkingTimePage']);
    Route::post('/updateWorkingTime/{id}',[drapicontroller::class,'updateWorkingTime']);
    Route::post('/deleteWorkingTime/{id}',[drapicontroller::class,'deleteWorkingTime']);

    Route::post('/storeLocation',[drapicontroller::class,'storeLocation']);








});
