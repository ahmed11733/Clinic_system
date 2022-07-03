
@foreach ($show as $item)

doctor name:{{$item->name}} <br>

doctor email:{{$item->email}} <br>
doctor Address:{{$item->address}} <br>
doctor mobile:  {{$item->mobile_number}} <br>

<form action="{{url('profile/'.$item->id)}}" method="post">
    @csrf
<input type="submit" value="show profile">
</form>

@endforeach
