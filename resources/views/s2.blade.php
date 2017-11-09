@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<h2 class='text-center'> Patient Details </h2>
				<br>
				<h3> &emsp;&emsp;Patient ID: {{$pid}} &emsp; &emsp;  
				@foreach($pt as $r)
					@if($r->Ptid==$pid)
						Pt Name:{{$r->PName}} &emsp; &emsp;Pt Gender:{{$r->Sex}}
						 &emsp; &emsp; Contact: {{$r->Address}}  &emsp; Ph:{{$r->Contact}}
					@endif
				@endforeach
				
			</h3>


			<table class="table table-striped">
			<tr>
				<th> Bill ID  </th>
				<th> Bill Amount</th>
				<th> Billed By </th>
				<th> Billed On </th>
			</tr>
			@foreach($bill as $r)
				@if($r->Pid==$pid)
				<tr>
					<td>  
					<form action="/search3" method="post">
					{{ csrf_field() }}
						<input style="width:50px" value={{$r->BillId}} name="did"  >
						<input type="Submit"  name="Submit" value="check" style="
	        background-color: green;
	        color: black;
	        border: none;
	        cursor: pointer;
	        width: 15%;">
				</form>


					</td>
					<td> {{$r->BillAmount}} </td>
					@foreach($user as $q)
						@if($q->id==$r->Eid)
							<td> {{$q->name}} </td>
						@endif
					@endforeach
					<td> {{$r->created_at}} </td>
				</tr>
				@endif
			@endforeach

@endsection