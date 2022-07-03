
<h1>Set working time</h1>



<form action="{{url('setWorkingTime')}}" method="post">
@csrf

<input type="number" name="doctor_id"   value="{{Auth::guard('doctor')->user()->id}}" hidden readonly required ><br>
<input type="text" name="name" placeholder="enter day name"  ><br>

<!-- <label for="cars">Choose a day:</label> 

<select name="days" id="days"> <br>
  <option value="name"></option>
  <option value="name">Sunday </option>
  <option value="name">Monday</option>
  <option value="name">Tuesday</option>
  <option value="name">Wednesday</option>
  <option value="name">Thursday</option>
  <option value="name">Friday</option> 


</select> <br>
 -->





<input type="number" name="start" placeholder="enter the start time"  ><br>
<input type="number" name="end" placeholder="enter the end time"  ><br>
<input type="submit" value="Set Working Time">

</form>