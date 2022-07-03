@foreach ($patients as $item)


Patient name:{{$item->id}} <br>
Patient name:{{$item->name}} <br>

Patient email:{{$item->email}} <br>
Patient mobile:  {{$item->mobile_number}} <br>



<form action="{{url('addTreatment')}}" method="POST">
    @csrf
    <input type="number" name="doctor_id"   value="{{Auth::guard('doctor')->user()->id}}" hidden readonly required ><br>
    <input type="number" name="patient_id"  value="{{$item->id}}" hidden readonly required><br>

<input type="date" name="treatment_date" value="enter the date "> <br>
    <input type="text" name="treatment_content" placeholder="enter the content of rousheta" > <br>
        <input type="submit" value="add data">
<hr>
</form>




@endforeach