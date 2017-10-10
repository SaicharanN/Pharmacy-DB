@extends('layouts.app')

@section('content')

<div>
	<p style="color:black; font-size: 50px; padding:50px">
		We have exciting offers for our regular customers..<br>
		We hope it's you too.
	</p>

	<form action="/minicreatebi" method="post">
	    
	  <div class="container">
		{{ csrf_field() }}
	    <label><b style="color:red; font-size: 40px">PatientID</b></label>
	    <input placeholder="" style="font-size: 30px" name="Pid">
	  
	  	<input type="Submit" name="Submit" value="submit" style="
        background-color: blue;
        color: white;
        padding: 14px 20px;
        margin-left: 60px;
        border: none;
        cursor: pointer;
        width: 15%;">
        </div>
	 </form>
	 <br><br>
	 <form action="/newuserbi" method="post">
	 	<div class="container">
	 		{{ csrf_field() }}
	 		<input type="Submit" name="Submit" value="No thanks  ->" style="
        background-color: blue;
        color: white;
        padding: 14px 20px;
        margin-left: 200px;
        border: none;
        cursor: pointer;
        width: 20%;">
    	</div>
    </form>
 </div>



@endsection