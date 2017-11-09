@extends('layouts.app')

@section('content')
<div style="background-image: url('imgg.jpg'); margin-top: -30px"> 
<div>
	<p style="color:yellow; font-size: 50px; padding:50px">
		We have exciting offers for our regular customers..<br>
		We hope it's you too.
	</p>

	<form action="/minicreatebi" class="form-inline" method="post">
	    
	  <div class="container">
		{{ csrf_field() }}
	    <label><b style="color:red; font-size: 35px">PatientID</b></label>
	    <input placeholder="" class="form-control" style="font-size: 19px" name="Pid">
	  
	  	<input type="Submit" class="btn btn-success" name="Submit" value="submit" style="
        background-color: blue;
        color: white;
       
        margin-left: 60px;
        border: none;
        cursor: pointer;
        width: 10%;
        height: 1%" >
        </div>
	 </form>
	 <br>
	 <form action="/newuserbi" method="post">
	 	<div class="container">
	 		{{ csrf_field() }}
	 		<input type="Submit" name="Submit" class="btn btn-success" value="No thanks  ->" style="
        background-color: blue;
        color: white;
        
        margin-left: 200px;
        border: none;
        cursor: pointer;
        width: 10%;">
    	</div>
    </form>
 </div>

<br><br> <br><br><br> <br><br><br><br><br>
</div>
@endsection