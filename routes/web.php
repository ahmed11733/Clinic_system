<?php

use App\Http\Controllers\drwebcontroller;
use App\Http\Controllers\userwebcontroller;
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

Route::get('/', function () {
    return view('index');
});


Route::middleware('guest')->group(function()
{

  //Doctor Login
  Route::post('doctorLogin',[drwebcontroller::class,'doctorLogin']);
  Route::get('doctorLoginForm',[drwebcontroller::class,'doctorLoginForm']);

  //Doctor Register
  Route::get('doctorRegisterForm',[drwebcontroller::class,'doctorRegisterForm']);
  Route::post('doctorRegister',[drwebcontroller::class,'doctorRegister']);




    Route::post('userLogin',[userwebcontroller::class,'userLogin']);//User Register
    Route::get('userLoginForm',[userwebcontroller::class,'userLoginForm'])->name('login');

    //User Register
    Route::get('userRegisterForm',[userwebcontroller::class,'userRegisterForm']);
    Route::post('userRegister',[userwebcontroller::class,'userRegister']);

});
Route::middleware('auth:doctor')->group(function()
{
        Route::get('schedule',[drwebcontroller::class,'schedule']);
        Route::get('doctorHome',[drwebcontroller::class,'doctorHome']);
        Route::get('profile',[drwebcontroller::class,'profile']);
        Route::post('addweek',[drwebcontroller::class,'addweek']);
        Route::post('DRlogout',[drwebcontroller::class,'logout']);
        Route::get('getPatients',[drwebcontroller::class,'getPatients']);

        Route::post('/deleteWorkingTime/{id}',[drwebcontroller::class,'deleteWorkingTime']);


});


Route::middleware('auth:web')->group(function()
{

    Route::get('userHome',[userwebcontroller::class,'userHome']);



    Route::get('userProfile',[userwebcontroller::class,'userProfile']); 
    Route::get('/user/editProfile/{id}',[userwebcontroller::class,'editProfile']);
    Route::post('updateProfile/{id}',[userwebcontroller::class,'updateProfile']);
    
    Route::get('usersearch',[userwebcontroller::class,'usersearch']); 

    
    Route::get('user/doctors',[userwebcontroller::class,'showDoctors']);
    Route::post('userlogout',[userwebcontroller::class,'logout']);
    Route::post('/profile/{id}',[userwebcontroller::class,'doctorProfile']);
    
    Route::post('/select/{id}',[userwebcontroller::class,'selectDoctor']);
    
    Route::get('/showTreatments',[userwebcontroller::class,'showTreatments']);
    
    //medical 
    Route::get('/showMedicalHistory',[userwebcontroller::class,'showMedicalHistory']);
    Route::post('addMedicalHistoryy',[userwebcontroller::class,'addMedicalHistoryy']);
    Route::put('updateMedicalHistoryy/{id}',[userwebcontroller::class,'updateMedicalHistoryy']);

     
    Route::post('/createReview',[userwebcontroller::class,'createReview']);
    Route::get('/showReviews',[userwebcontroller::class,'showReviews']);
    Route::get('search',[userwebcontroller::class,'search']);
    Route::get('firstAid',[userwebcontroller::class,'firstAid']);

    
    
    
    Route::get('/bookedAppointments',[userwebcontroller::class,'bookedAppointments']);
    Route::post('/cancelAppointment/{id}',[userwebcontroller::class,'cancelAppointment']);
    
    

});
