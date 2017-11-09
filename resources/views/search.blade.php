@extends('layouts.app')

@section('content')
<div style="background-color: grey ;margin-top: -30px">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4" style="background-color:lavender; border-radius: 30% ">
    	<h1 style="color:black; font-size: 50px; padding:50px"> Search by Drug Id </h2>
    	<form action="/search1" method="post" class="form-inline" style="margin-left: 50px">
    				{{ csrf_field() }}
    		<label><b style="color:red; font-size: 20px">Enter Drug here</b></label><br>
	    	<input placeholder="" class="form-control" style="font-size: 20px; width:200px" name="did" list="hemu">
	    	<datalist id="hemu">
	            @foreach($drug as $r)
	                <option value={{$r->DrugName}} >
	            @endforeach
	        </datalist>
            
	    	<input type="Submit" class="btn btn-primary"  name="Submit" value="Go" >
    	</form>
        <br>
        <br>
        
    </div>
    <div  style="margin-top: 120px;">
    <div class="col-sm-4" style="background-color:lavender; border-radius: 30% " >
    	<h1 style="color:black; font-size: 50px; margin-left:50px; padding:50px"> Search by Patient Id </h2>
    	<form action="/search2"  class="form-inline"  method="post">
    				{{ csrf_field() }}
    		<label><b style="color:red; font-size: 20px;  margin-left:90px">Enter Patient Id here</b></label><br>
	    	<input placeholder="" class="form-control" style="font-size: 20px; width:200px; margin-left:90px" name="Pid">
	    	<input type="Submit" class="btn btn-primary"  name="Submit" value="Go" >
    	</form>
        <br>
    </div>
</div>
    <div style="margin-top: 200px;">
    <div class="col-sm-4" style="background-color:lavender; border-radius: 30% ">
    	<h1 style="color:black; font-size: 50px; margin-left:50px; padding:50px"> Search by Bill Id </h2>
    	<form action="/search3" class="form-inline" method="post">
    				{{ csrf_field() }}
    		<label><b style="color:red; font-size: 20px; margin-left:90px">Enter BillId here</b></label><br>
	    	<input placeholder="" class="form-control" style="font-size: 20px; width:200px; margin-left:90px" name="did">
	    	<input type="Submit" class="btn btn-primary"  name="Submit" value="Go" >
    	</form>
        <br>
        <br>
        </div>
    </div>
  </div>
</div>

</body>
<br> <br>
</div>

@endsection