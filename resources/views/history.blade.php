@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<h2 class='text-center'> Recent.. </h2>


			<table class="table table-striped">
			<tr>
				<th> Date </th>
				<th> Time </th>
				<th> BillId </th>
				<th> Amount </th>
				<th> Billed by</th>
			</tr>

			@foreach($bill as $r)
			<tr>
				<td> {{substr($r->created_at,0,10)}} </td>
				<td> {{substr($r->created_at,11)}} </td>
				<td>
				<form action="/search3" method="post">
					{{ csrf_field() }}
					<input style="width:50px" value={{$r->BillId}} name="did"  >
					<input type="Submit"  name="Submit" value="check" style="
        background-color: green;
        color: black;
        border: none;
        cursor: pointer;
        width: 15%;
        height:1%">
				</form>
				</td>
				<td> Rs: {{$r->BillAmount}} </td>
				<td> 
				@foreach($user as $t)
					@if($t->id == $r->Eid)
						{{$t->name}}
					@endif
				@endforeach
				</td>
			</tr>	
			@endforeach

@endsection