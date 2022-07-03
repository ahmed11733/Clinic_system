@foreach ($bookedAppointments as $item)

doctor name:{{$item->name}} <br>
doctor mobbile:{{$item->mobile_number}} <br>

Boooked Day:{{$item->day}} <br>
Boooked Day created_at:{{$item->created_at}} <br>


<form action="{{url('cancelAppointment/'.$item->id)}}" method="post">
    @csrf
<input type="submit" value="Delete">
</form>




<h1>________</h1>
@endforeach

