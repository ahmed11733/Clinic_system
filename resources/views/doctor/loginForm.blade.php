
        Doctor

<form action="{{url('doctorLogin')}}" method="post">
    @csrf
    <input type="email" name="email" >
    <input type="password" name="password" >
    <input type="submit" value="login">

</form>
