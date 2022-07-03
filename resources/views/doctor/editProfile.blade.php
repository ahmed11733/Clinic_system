

<h1>Edit Doctor Profile</h1>
       

      <div class="col">
        <form method="POST" action="{{url('/doctor/updateProfile/'.$doc->id)}}" enctype="multipart/form-data">
            @csrf

         
                <div class="form-group" >
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="text" value="{{$doc->name}}" class="form-control" name="name" >
                </div>

                <div class="form-group" >
                  <label for="exampleFormControlInput1">Email</label>
                  <input type="text" value="{{$doc->email}}" class="form-control" name="email" >
                </div>

                
                <div class="form-group" >
                  <label for="exampleFormControlInput1">Mobile</label>
                  <input type="text" value="{{$doc->mobile_number}}" class="form-control" name="mobile_number" >
                </div>

                
                <div class="form-group" >
                  <label for="exampleFormControlInput1">Address</label>
                  <input type="text" value="{{$doc->address}}" class="form-control" name="address" >
                </div>



                <div class="form-group" >
                    <label for="exampleFormControlInput1">Photo</label>
                    <input type="file" class="form-control" name="photo">
                  </div>

        
                <div class="form-group" >
                  <button class="btn btn-success" type="submit">Update</button>
                </div>
              </form>  
        </div>
      
    </div>
  </div>

