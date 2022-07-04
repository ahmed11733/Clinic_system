<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\doctor as ModelsDoctor;
use App\Models\selectDoctor;
use App\Models\medicalHistory;
use App\Models\review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isEmpty;

class userwebcontroller extends Controller
{
    public function userLoginForm()
    {
        return view('user.loginForm');
    }

    //Login method
    public function userLogin(Request $request)
    {
        $data= Auth::guard('web')->attempt($request->only('email', 'password'));
        if($data)
        {
           return redirect('userHome');
 
        }
        return back()->withErrors(['wrong login information']);


    }
public function search(Request $request)
{
//$data=DB::table('select  name from doctors where speciality ='.$request->speciality);
$specialist=$request->input('search');
$governorate=$request->input('governorate');
$name=$request->input('name');

$data=Doctor::where('speciality', 'LIKE',"%$specialist%")->orWhere('governorate', 'LIKE',"%$governorate%")->orWhere('name', 'LIKE',"%$name%")->get();
return view('user.searchdoctor',['data'=>$data]);
}

    public function usersearch()
    {
       
        return view('user.searchdoctor');
    }
    public function firstAid()
    {
       
        return view('user.aid');
    }

    
    
    //Register method
    public function userRegister(Request $request)
    {
        $data= $request->validate
        ([
            'name'              => 'required|string',
            'email'             => 'required|string',
            'password'          => 'required|string',
            'mobile_number'     => 'required|string',
            'gender'            ,
            'photo'            ,

        ]);

           // If you will store photo you should save it firstly in Public
           $photo = $request->photo; 
           if ($request->photo) {
           $newPhoto = time().$photo->getClientOriginalName();
           $photo->move('uploads/users_profiles/', $newPhoto);
        $data['photo']='uploads/users_profiles/'.$newPhoto ;
         }

          
           
        $data['gender']=$request->gender;


        $data['password']=bcrypt($data['password']);

 //       User::create($data);

        
        // return view('user.home');

        $s=User::create($data);
        $doctor= Doctor::all();
        $mydoctor=  DB::select('SELECT select_doctors.patient_id, doctors.name, doctors.id,doctors.speciality ,doctors.photo FROM doctors INNER JOIN select_doctors ON select_doctors.doctor_id=doctors.id AND select_doctors.patient_id='.$s->id);

        return view('user.home',[
            'doctor'=>$doctor,
            's'=>$mydoctor
        ]);

    }


    public  function showDoctors(){
        $ss = DB::table('doctors')->get()->all();
        return view('user.doctors',['show'=>$ss]);
    }


    public function logout(Request $request)
    {
       // auth()->logout();
       Auth::guard('web')->logout();
        return redirect('');
    }




    public function userHome(){
        $id = Auth::guard('web')->user()->id;
        $user = User::find($id);
        $doctor= Doctor::all();
    //   $s= DB::select('SELECT select_doctors.patient_id from select_doctors where select_doctors.patient_id='.$id);
       $mydoctor=  DB::select('SELECT select_doctors.patient_id, doctors.name, doctors.id,doctors.speciality ,doctors.photo FROM doctors INNER JOIN select_doctors ON select_doctors.doctor_id=doctors.id AND select_doctors.patient_id='.auth::guard('web')->user()->id);

        return view('user.home',[
            'user' => $user,
            'doctor'=>$doctor,
             's'=>$mydoctor
        ]);

    }



    public function doctorProfile($id){
        $profile = Doctor::find($id);
        $doctorTime = DB::select('SELECT week_days.name , week_days.start , week_days.end FROM week_days WHERE week_days.doctor_id='.$id);
        return view('doctor.doctorProfile_user',[
            'doctor'=>$profile,
            'doctorTime' =>$doctorTime,
        ]);
    }

    public function selectDoctor(Request $request , $id){
        $data = $request->validate([
            'patient_id',
            'doctor_id',
            'day',
        ]);

        $data ['patient_id']    = Auth::guard('web')->id(); // ID of current login user
        $data ['doctor_id']     = $id;  // Doctor_id will be passed from the doctor home view
      //  $data ['day']     = $request->day ;  // 3aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        selectDoctor::create($data);
return redirect('doctorProfile');
    }


    public function showTreatments(){
        $treatments = DB::select('SELECT treatments.treatment_content , treatments.treatment_date  , doctors.name, doctors.id , doctors.mobile_number FROM doctors INNER JOIN treatments ON treatments.doctor_id = doctors.id AND treatments.patient_id='.Auth::guard('web')->user()->id);
        return view('user.treatments',[
            'treatments' => $treatments,
        ]);
    }


    public function bookedAppointments(){

        $bookedAppointments = DB::select('SELECT select_doctors.id , doctors.name , doctors.mobile_number ,select_doctors.day  FROM doctors INNER JOIN select_doctors ON select_doctors.doctor_id = doctors.id AND select_doctors.patient_id='.Auth::guard('web')->user()->id);
        return view('user.bookedAppointments',[
            'bookedAppointments' => $bookedAppointments,

        ]);
    }

    public function cancelAppointment($id){

        $appointment = selectDoctor::find($id);
        $appointment->forceDelete();
        return redirect()->back();

    }




    public function userProfile(){

        $id = Auth::guard('web')->user()->id;
        $profile = User::find($id);

        return view('user.profile',[
            'user' => $profile
        ]);
    }



    public function editProfile($id){

        $user = User::find($id);

        return view('user.editProfile',[
            'user' => $user

        ]);

    }

    public function updateProfile(Request $request, $id){

     $data= $request->validate
        ([
            'name'              => 'required|string',
            'mobile_number'      => 'required|string',
            'email'                 => 'required|email',
            
        ]);
        $s=User::find($id);
            
        $s->update($data);
        return view('user.home');

/*
    

         user::where('id',$id)->update([
            'name' => $name
         ]);
$teachers = $request->all();
$id->save($teachers);*/


    }


    
    public function showMedicalHistory(){

        $mh = DB::select('SELECT medical_histories.id,medical_histories.height , medical_histories.weight  , medical_histories.bloodType, medical_histories.relationshipState , medical_histories.diseases FROM medical_histories WHERE medical_histories.patient_id='.Auth::guard('web')->user()->id);


        return view('user.medicalHistory' , ['mh' => $mh]);
        
    }



    public function addMedicalHistoryy(Request $request){
    $data= $request->validate
        ([
          
            'height',
            'weight',
            'bloodType',
            'relationshipState',
            'diseasess',
            'patient_id',
        ]);

        $data['patient_id'] = Auth::guard('web')->user()->id;
        $data['height'] = $request->height;
        $data['weight'] = $request->weight;
        $data['bloodType'] =$request->bloodType;
        $data['relationshipState'] =$request->relationshipState;
        $data['diseases'] =$request->diseases;


        //medicalHistory::create($data);
medicalHistory::create($data);
        return redirect('showMedicalHistory');



    }

public function updateMedicalHistoryy( $id,Request $request )
{ 

$data=medicalHistory::find($id)(
[
    'height'=>$request->get('height'),
    'weight'=>$request->get('weight'),
    'bloodType'=>$request->get('bloodType'),
    'relationshipState'=>$request->get('relationshipState'),
    'diseases'=>$request->get('diseases'),

]);

$data->save();
}

    // public function getMedicalHistory(){

    //     $mh = DB::table('medical_histories')->get()->all();
    //     return view('user.medicalHistory',['mh'=>$mh]);

    // }


    public function createReview(Request $request , $id){
        $data = $request->validate([
            'patient_id',
            'doctor_id',
            'content',
            'rate',

        ]);

        $data ['patient_id']    = Auth::guard('web')->id(); // ID of current login user
        $data ['doctor_id']     = $id;  // Doctor_id will be passed from the view
        $data ['content']       = $request->content ;
        $data ['rate']          = $request->rate ; 
        review::create($data);

        return view('user.home');

    }


    public function showReviews(){

        $reviews = DB::select('SELECT reviews.rate , reviews.content , users.name FROM users INNER JOIN reviews ON reviews.patient_id = users.id AND reviews.patient_id='.Auth::guard('web')->user()->id);
        return view('user.doctorReviews',[
            'reviews' => $reviews
        ]);
    }





}
