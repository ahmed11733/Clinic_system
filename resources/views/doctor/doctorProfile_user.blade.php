Doctor Id : {{$doctor->id}} <br>
Doctor name :  {{$doctor->name}} <br>
Doctor email : {{$doctor->email}}<br>
Doctor address : {{$doctor->address}}<br>

<h1>_______________________</h1>



@foreach ($doctorTime as $item)

Doc Day : {{$item->name}} <br>
Start at : {{$item->start}} <br>
End at : {{$item->end}} <br>



 <!-- Passing doc id to selectDoctor method in UserController -->
<form action="{{url('/select/'.$doctor->id)}}" method="POST"> 
@csrf

<input type="text" name="day"   value="{{$item->name}}" hidden readonly required ><br>


<input type="submit" value="Book an appointment on this day"> 

</form>
 


<h1>____________</h1>
@endforeach





