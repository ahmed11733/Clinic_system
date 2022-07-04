<?php

namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\treatment;
use App\Models\WeekDays;
use App\Models\Location;
use App\Models\medicalHistory;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Contracts\Cache\Store;

 use Illuminate\Support\Facades\Storage;


class drapicontroller extends Controller
{
   
    public function __construct() {
        $this->middleware('auth:doc_api', ['except' => ['doctorLogin', 'doctorRegister']]);
         }


         public function doctorLogin(Request $request){
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



        public function doctorRegister(Request $request) {
            $validator = Validator::make($request->all(), [

                'name'          => 'required|string',
                'email'         => 'required|string',
                'password'      => 'required|string',
    
                'speciality'       => 'required|string',
                'gender'       => 'required|string',
                'governorate'       => 'required|string',

    
                'mobile_number' => 'required|string',
                'photo'         => 'required',
    
                'chinicPhoto1'         => 'required',
                'chinicPhoto2'         => 'required',
                'chinicPhoto3'         => 'required',
    
                'chinicBill1'         => 'required',
                'chinicBill2'         => 'required',
    
                'latitude'         => 'required',
                'longitude'         => 'required',
    
                'examinationPrice'         => 'required|string',
                'waitTime'                 => 'required|string',

            ]);
            
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

         

    
        $user = Doctor::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
                ));
               

                
        return response()->json([
            'message' => 'Doctor successfully registered',
            'user' => $user ,
    
        ], 201);
       
    
    }





    public function logout(){
        auth()->logout();
        return response()->json([
            'message' => 'Doctor Logedout successfully'
        ]);
    }



    public function getPatients(){
        $patients = DB::select('SELECT select_doctors.patient_id , users.name ,users.id , users.mobile_number, users.email FROM users INNER JOIN select_doctors ON select_doctors.patient_id = users.id AND select_doctors.doctor_id ='.Auth::guard('doc_api')->user()->id);

        return response()->json([
            'patients' => $patients
        ], 201);

    }

    public function addTreatment(Request $request){

        $data = $request->validate([
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'treatment_content'=>'required|string',
            'treatment_date'=>'required'
        ]);
        Treatment::create($data);

        return response()->json([
            'message' => 'Treatment added successfully',
        ], 201);


    }



    public function showTreatments(){
        $treatments = DB::select('SELECT treatments.treatment_content , treatments.patient_id , treatments.treatment_date FROM treatments WHERE treatments.doctor_id='.Auth::guard('doc_api')->user()->id);

        return response()->json([
            'treatments' => $treatments ,
        ], 201);

    }




    public function profile(){
        $id = Auth::guard('doc_api')->user()->id;
        $profile = Doctor::find($id);
        $doctorTime = DB::select('SELECT week_days.id, week_days.name , week_days.start , week_days.end FROM week_days WHERE week_days.doctor_id='.$id);

        return response()->json([
            'doc' => $profile ,
            'doctorTime' => $doctorTime ,

        ], 201);

    }

    
    public function patientMedicalHistoryData(){
        //$data = DB::select('SELECT medical_histories.height , medical_histories.weight  FROM medical_histories WHERE medical_histories.patient_id='.$id);

        $data = DB::table('medical_histories')->get()->all();
        return response()->json(['data'=>$data]);
      
        // return response()->json([
        //     'data' => $data 
        // ], 201);

    }


    public function editProfile($id){

        $doc = Doctor::find($id);

        return response()->json([
            'doc' => $doc ,

        ], 201);

    }

    public function updateProfile(Request $request,$id){

        $doctor = Doctor::find($id);
            // Firstly validate
            $data= $request->validate
            ([
  
                'photo'                 => 'required',
                'about'                 => 'required|string',
                'country'               => 'required|string',
                'year'                  => 'required|string',
                'uni'                   => 'required|string',
                'degree'                => 'required|string',




            ]);



            $doctor->photo = $request->photo;
            $doctor->about = $request->about;
            $doctor->country = $request->country;
            $doctor->year = $request->year;
            $doctor->uni = $request->uni;
            $doctor->degree = $request->degree;


        $doctor->save();


        return response()->json([
            'message' =>'Doctor profile updated successfully',
        ], 201);

    }



    // public function showWorkingTimePage(){
    //     return view('doctor.setWorkingTime');
    // }



    public function setWorkingTime(Request $request){

        $data = $request->validate([
            'doctor_id'=>'required',
            'name'=>'required|string',
            'start'=>'required',
            'end'=>'required'
        ]);


        WeekDays::create($data);

        return response()->json([
            'message' =>'Doctor Set working time successfully',
        ], 201);
    }


    public function editWorkingTimePage($id){

        $weekDays = WeekDays::find($id);

        return response()->json([
            'item' =>$weekDays
        ], 201);

    }


    public function updateWorkingTime(Request $request , $id)
    {
        $request->validate([
            'doctor_id'=>'required',
            'name'=>'required|string',
            'start'=>'required',
            'end'=>'required'
        ]);


        $weekDays = WeekDays::find($id);

        $weekDays->name = $request->name;
        $weekDays->start = $request->start;
        $weekDays->end = $request->end;


       $weekDays->save();

       return response()->json([
        'message' =>'Doctor update working time successfully',
    ], 201);

    }


    public function deleteWorkingTime($id){

        $weekDays = WeekDays::find($id);
        $weekDays->forceDelete();
        return response()->json([
            'message' =>'Doctor delete working time successfully',
        ], 201);

    }



    public function storeLocation(Request $request){

        Location::create([
            'doctor_id' => Auth::guard('doc_api')->user()->id,
            'latitude'=>$request->lat,
            'longitude'=>$request->lng
        ]);
               return response()->json([
            'message' =>'Location stored successfully',
        ], 201);
    }


    protected function createNewToken($token){

        return response()->json([
            'message'=>'login sucessfully',
            'status'=>'true',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'doctor'=> Auth::guard('doc_api')->user()
        ]);
    }



    protected function guard()
    {
        return Auth::guard('doc_api');

    }



}
