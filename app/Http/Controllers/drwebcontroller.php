<?php

namespace App\Http\Controllers;

 
use App\Models\Doctor;
use App\Models\Treatment;
use App\Models\WeekDays;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class drwebcontroller extends Controller
{
    

    protected function guard()
    {
    return Auth::guard('doctor');

}

                //_____________________Login_____________________
    //Login Form
    public function doctorLoginForm()
    {
        return view('doctor.loginForm');
    }

    //Login method
    public function doctorLogin(Request $request)
    {
        $data= Auth::guard('doctor')->attempt($request->only('email', 'password'));
        if($data)
        {
            $week=WeekDays::get()->where('doctor_id', Auth::guard('doctor')->user()->id);       

            return view('doctor.home',['week'=>$week]);

        }
        return back()->withErrors(['wrong login information']);
    }

                //_____________________Register_____________________

    //Register Form
    public function doctorRegisterForm()
    {
        return view('doctor.registerForm');
    }

    public function addweek(Request $request)
    {
        $data= $request->validate
        ([
        'name'  =>'required',
        'start' =>'required',
        'end' =>'required',
        'doctor_id'
        ]);
$data['doctor_id']=Auth::guard('doctor')->user()->id;
        WeekDays::create($data);
        return redirect('doctorHome');

      
    }

    //Register method
    public function doctorRegister(Request $request)
    {
        $data= $request->validate
        ([
            'name'                  => 'required|string', 
            'email'                 => 'required|string',
            'password'              => 'required|string',

            'speciality'            => 'required|string', 
            'gender'                => 'required|string', 
            'governorate'           => 'required|string',


            'mobile_number'         => 'required|string', 
            'photo'             ,         

            // 'chinicPhoto1'          => 'required',
            // 'chinicPhoto2'          => 'required',
            // 'chinicPhoto3'          => 'required',

            // 'chinicBill1'           => 'required',
            // 'chinicBill2'           => 'required',

            'latitude'              => 'required', 
            'longitude'             => 'required',  

            'examinationPrice'      => 'required', 
            'waitTime'              => 'required', 





        ]);

        // If you will store photo you should save it firstly in Public
       if ( $request->photo) {
            $file = $request->photo; // hnb3tha lsaaa
            $filename=Storage::putFile("public",$file);
            $data['photo']=$filename;
  }
       
        $data['password']=bcrypt($data['password']);

        Doctor::create($data);
        //  return view('doctor.home');

        $week = WeekDays::get()->where('doctor_id', Auth::guard('doctor')->user()->id);       

        return view('doctor.home',['week'=>$week]);

    }



    
    public function updateProfile(Request $request,$id){

        $doctor = Doctor::find($id);

        // Firstly validate
        $data= $request->validate
        ([
            'name'                  => 'required|string',
            'email'                 => 'required|string',
            'password'              => 'required|string',

            'speciality'            => 'required|string',
            'gender'                => 'required|string',
            'governorate'           => 'required|string',


            'mobile_number'         => 'required|string',
            'photo'                 => 'required',

            'chinicPhoto1'          => 'required',
            'chinicPhoto2'          => 'required',
            'chinicPhoto3'          => 'required',

            'chinicBill1'           => 'required',
            'chinicBill2'           => 'required',

            'latitude'              => 'required|decimal',
            'longitude'             => 'required|decimal',

            'examinationPrice'      => 'required|string',
            'waitTime'              => 'required|string',


            
            'about'                 => 'required|string',
            'country'               => 'required|string',
            'year'                  => 'required|string',
            'uni'                   => 'required|string',
            'degree'                => 'required|string',




        ]);


        // if($request->has('photo')){
        //     $photo = $request->photo;
        //     $newPhoto = time().$photo->getClientOriginalName();
        //     $photo->move('uploads/doctors_profiles',$newPhoto);
        //     $doctor->photo = 'uploads/doctors_profiles/'.$newPhoto;
        // }

        // Secondly Update
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->password = bcrypt($request->password);

        $doctor->speciality = $request->speciality;
        $doctor->gender = $request->gender;
        $doctor->governorate = $request->governorate;

        $doctor->mobile_number = $request->mobile_number;
        $doctor->photo = $request->photo;

        
        $doctor->chinicPhoto1 = $request->chinicPhoto1;
        $doctor->chinicPhoto2 = $request->chinicPhoto2;
        $doctor->chinicPhoto3 = $request->chinicPhoto3;


        $doctor->chinicBill1 = $request->chinicBill1;
        $doctor->chinicBill2 = $request->chinicBill2;

        
        $doctor->latitude = $request->latitude;
        $doctor->longitude = $request->longitude;

        $doctor->examinationPrice = $request->examinationPrice;
        $doctor->waitTime = $request->waitTime;


        $doctor->about = $request->about;
        $doctor->country = $request->country;
        $doctor->year = $request->year;
        $doctor->uni = $request->uni;
        $doctor->degree = $request->degree;




        $doctor->save();

        return view('doctor.home');

    }



    public function logout(Request $request){
        Auth::guard('doctor')->logout();
        return redirect('');

    }


    public function getPatients(){
        $patients = DB::select('SELECT select_doctors.patient_id , users.name ,users.id , users.mobile_number, users.email FROM users INNER JOIN select_doctors ON select_doctors.patient_id = users.id AND select_doctors.doctor_id ='.Auth::guard('doctor')->user()->id);
        return view('doctor.patients',[
            'patients' => $patients
        ]);

    }

    public function addTreatment(Request $request){

        $data = $request->validate([
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'treatment_content'=>'required|string',
            'treatment_date'=>'required'
        ]);
        Treatment::create($data);

        return view('doctor.home');


    }



    public function showTreatments(){
        $treatments = DB::select('SELECT treatments.treatment_content , treatments.treatment_date FROM treatments WHERE treatments.doctor_id='.Auth::guard('doctor')->user()->id);
        return view('doctor.treatments',[
            'treatments' => $treatments,

        ]);
    }




    public function profile(){
        $id = Auth::guard('doctor')->user()->id;
        $profile = Doctor::find($id);
        $doctorTime = DB::select('SELECT week_days.id, week_days.name , week_days.start , week_days.end FROM week_days WHERE week_days.doctor_id='.Auth::guard('doctor')->user()->id);
        return view('doctor.profile',[
            'doc'=>$profile,
            'doctorTime' =>$doctorTime,
        ]);

    }

    public function patientMedicalHistoryData($id){
        $data = DB::select('SELECT medical_histories.height , medical_histories.weight , medical_histories.bloodType , medical_histories.relationshipState , medical_histories.diseases FROM medical_histories WHERE medical_histories.patient_id='.$id);

        return view('doctor.patientHistory' , [

            'history' => $data ,
        ]);

    }


    public function doctorHome(){
        $id = Auth::guard('doctor')->user()->id;
        $doc = Doctor::find($id);
 //$week=   DB::table('select week_days.name,week_days.start,week_days.end from week_days where doctor_id='.Auth::guard('doctor')->user()->id);
 $week=WeekDays::get()->where('doctor_id',$id);       
 return view('doctor.home'
        ,[
            'doc' => $doc,
            'week'=>$week
        ]);

    }

    public function schedule(){
        $id = Auth::guard('doctor')->user()->id;
        $doc = Doctor::find($id);

        return view('doctor.schedule',[
            'doc' => $doc

        ]);

    }


    public function editProfile($id){

        $doc = Doctor::find($id);

        return view('doctor.editProfile',[
            'doc' => $doc

        ]);

    }




    public function showWorkingTimePage(){
        return view('doctor.setWorkingTime');
    }



    public function setWorkingTime(Request $request){

        $data = $request->validate([
            'doctor_id'=>'required',
            'name'=>'required|string',
            'start'=>'required|string',
            'end'=>'required|string'
        ]);

        //$data ['doctor_id'] = Auth::guard('doctor')->user()->id;  //Auth::guard('web')->id();

        WeekDays::create($data);

        return view('doctor.home');
    }


    public function editWorkingTimePage($id){

        $weekDays = WeekDays::find($id);
        return view('doctor.editWorkingTime', [
            'item' => $weekDays

        ]);

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
       return view('doctor.home');
    }


    public function deleteWorkingTime($id){

        $weekDays = WeekDays::find($id);
        $weekDays->delete();
        return redirect()->back();


    }





    public function showAddLocation(){
        return view('doctor.location');
    }

    public function storeLocation(Request $request){

        Location::create([
            'doctor_id' => Auth::guard('doctor')->user()->id,
            'latitude'=>$request->lat,
            'longitude'=>$request->lng
        ]);
        return view('doctor.home');
    }





}
