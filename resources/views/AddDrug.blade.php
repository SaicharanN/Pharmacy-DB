@extends('layouts.app')

@section('content')

<div>
	<p style="color:black; font-size: 50px; padding:50px">
		Enter New Drugs here..<br>
	</p>

	<form action="/addDrugbi" method="post">
	    
	  <div class="container">
		{{ csrf_field() }}
	    <label><b style="color:red; font-size: 20px">DrugName</b></label>
	    <input placeholder="Enter drug name" style="font-size: 20px" name="Dname">
	  	<label><b style="color:red; font-size: 20px">Quantity</b></label>
	  	<input placeholder="enter quantity" style="font-size: 20px" name="quan">
	  	<label><b style="color:red; font-size: 20px">Drug price</b></label>
	    <input placeholder="Enter drug Price" style="font-size: 20px" name="price"> <br><br>
	 	<input type="Submit" name="Submit" value="enter" style="
        background-color: blue;
        color: white;
        padding: 14px 20px;
        margin-left: 500px;
        border: none;
        cursor: pointer;
        width: 10%;">
    	</div>
    </form>
 </div>

 @endsection