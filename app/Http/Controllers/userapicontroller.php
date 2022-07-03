<?php

namespace App\Http\Controllers;


use App\Models\Doctor;

use App\Models\selectdoctor;

use App\Models\User;

use App\Models\review;

use App\Models\medicalHistory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Contracts\Cache\Store;

 use Illuminate\Support\Facades\Storage;

class userapicontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['userLogin', 'userRegister']]);
         }



    //______________________________________________

    public function userLogin(Request $request){
    	$validator = Validator::make($request->all(), [
        'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (!$token=$this->guard()->attempt($validator->validated()))
        {
            return response()->json(['message' => 'error please check your user name and password and try again',
        'status'=>'false'], 401);
        }
        return $this->createNewToken($token);

    }


    public function userRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string',
            'email'             => 'required|string',
            'password'          => 'required|string',
            'mobile_number'     => 'required|string',
            'gender'            => 'required|string',
            'photo'             => 'required',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
  

            $user = User::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));
        return response()->json([
        'message' => 'User successfully registered',
        'user' => $user
        ], 201);

}


    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'User Logedout successfully'
        ]);
    }

        //______________________________________________




    public  function showDoctors(){
        $ss = DB::table('doctors')->get(['id','photo','name','mobile_number','speciality','latitude','longitude', 'examinationPrice' , 'governorate' , 'waitTime' ]);
        return response()->json(['data'=>$ss]);
    }

        //______________________________________________
        //______________________________________________
        //______________________________________________





    public function doctorProfile($id){
        $profile = Doctor::find($id);
        $doctorTime = DB::select('SELECT week_days.name , week_days.start , week_days.end FROM week_days WHERE week_days.doctor_id='.$id);
        return response()->json([
            'doctor' => $profile,
            'doctorTime' => $doctorTime
        ], 201);
    }


    public function showTreatments(){
        $treatments = DB::select('SELECT treatments.treatment_content , treatments.treatment_date  , doctors.name, doctors.id , doctors.mobile_number FROM doctors INNER JOIN treatments ON treatments.doctor_id = doctors.id AND treatments.patient_id='.Auth::guard('api')->user()->id);
        // eRROR W ATSLAAH
        return response()->json([
            'message' => 'Treatment has been shown',
            'treatments' => $treatments
        ], 201);
    }


    public function selectDoctor(Request $request , $id){
        $data = $request->validate([
            'patient_id',
            'doctor_id',
            'day',
        ]);

        $data ['patient_id']    = Auth::guard('api')->id(); // ID of current login user
        $data ['doctor_id']     = $id;  // Doctor_id will be passed from the doctor home view
        $data ['day']     = $request->day ;  // 3aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        selectDoctor::create($data);

        return response()->json([
            'message' => 'User successfully select doctor'
        ]);
    }


    public function bookedAppointments(){

        $bookedAppointments = DB::select('SELECT select_doctors.id , doctors.name , doctors.mobile_number ,select_doctors.day , select_doctors.created_at FROM doctors INNER JOIN select_doctors ON select_doctors.doctor_id = doctors.id AND select_doctors.patient_id='.Auth::guard('api')->user()->id);

        return response()->json([
            'bookedAppointments' => $bookedAppointments
        ], 201);
    }

    public function cancelAppointment($id){

        $appointment = selectDoctor::find($id);
        $appointment->forceDelete();

        return response()->json([
            'message' =>'User canceld the appointment successfully',
        ], 201);

    }



    public function userProfile(){

        $id = Auth::guard('api')->user()->id;
        $profile = User::find($id);

        return response()->json([
            'user' => $profile
        ], 201);
    }



    public function editProfile($id){

        $user = User::find($id);

        return response()->json([
            'user' => $user
        ], 201);

    }

    public function updateProfile(Request $request,$id){

        $user = User::find($id);

        // Firstly validate
        $data= $request->validate
        ([
            'name'              => 'required|string',
            'password'           => 'required|string',
            'mobile_number'      => 'required|string',
            'photo'             => 'required',
        ]);



        $user->name = $request->name;    
        $user->password = bcrypt($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->photo = $request->photo;

        $user->save();

        return response()->json([
            'message' =>'User profile updated successfully',
        ], 201);

    }



    public function addMedicalHistory(Request $request){

        
        $data= $request->validate
        ([
            'patient_id'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'bloodType'=>'required',
            'relationshipState'=>'required',
            'diseases'=>'required',

        ]);
        medicalHistory::create($data);

        return response()->json([
            'message' =>'Medical history added successfully',
        ], 201);



    }

    
    public function getMedicalHistory(){

        $mh = DB::table('medical_histories')->get()->all();
        return response()->json(['data'=>$mh]);
    }
    


    public function createReview(Request $request , $id){
        $data = $request->validate([
            'patient_id',
            'doctor_id',
            'content',
            'rate',

        ]);

        $data ['patient_id']    = Auth::guard('api')->id(); // ID of current login user
        $data ['doctor_id']     = $id;  // Doctor_id will be passed from the view
        $data ['content']       = $request->content ;
        $data ['rate']          = $request->rate ; 
        review::create($data);

        return response()->json([
            'message' =>'Review created successfully',
        ], 201);


    }


    public function showReviews($id){

        $reviews = DB::select('SELECT reviews.rate , reviews.content , users.name FROM users INNER JOIN reviews ON reviews.patient_id = users.id AND reviews.doctor_id='.$id);
        return response()->json(['reviews'=>$reviews]);
    }





    protected function createNewToken($token){

        return response()->json([
            'message'=>'login sucessfully',
            'status'=>'true',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user'=> Auth::guard('api')->user()
        ]);
    }
    protected function guard()
    {
        return Auth::guard('api');

    }
}
