
<h1>Edit working time</h1>



<form action="{{url('/updateWorkingTime/'.$item->id)}}" method="POST">
    @csrf


    <input type="number" name="doctor_id"   value="{{Auth::guard('doctor')->user()->id}}" hidden readonly required ><br>

             <div class="form-group" >


                  <label for="exampleFormControlInput1">Day</label>
                  <input type="text" value="{{$item->name}}" class="form-control" name="name" > 

             </div>

             <div class="form-group" >
                  <label for="exampleFormControlInput1">start</label>
                  <input type="number" value="{{$item->start}}" class="form-control" name="start" >
             </div>


             <div class="form-group" >
                  <label for="exampleFormControlInput1">end</label>
                  <input type="number" value="{{$item->end}}" class="form-control" name="end" >
             </div>



             <div class="form-group" >
                  <button class="btn btn-success" type="submit">Update</button>
                </div>

             

                
    </form>

   