

<form action="{{url('userRegister')}}" method="post" enctype="multipart/form-data">
    @csrf
  Name  <input type="name" name="name" >
  Email  <input type="email" name="email" >
  Password  <input type="password" name="password" >
  Mobile  <input type="text" name="mobile_number" >
  Address  <input type="text" name="address" >
  MedicalHistory  <input type="text" name="medical_history" >

  Photo <input type="file" class="form-control" name="photo">




   Button <input type="submit" value="reigister">

</form>
