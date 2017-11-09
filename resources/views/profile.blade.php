@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<h2 >{{Auth::user()->name}} </h2>
			<h2> Email: {{Auth::user()->email}} </h2>
			<a href="/edit"><button class="btn"  style="margin-left: 800px; font-size:20px"> Edit Profile</button></a>
			<a href="/pass"><button class="btn" style=" font-size:20px"> Change Password</button></a>
			<h2 class='text-center'> My Recent Bills..!! </h2>
			<table class="table table-striped">
			<tr>
				<th> Date </th>
				<th> Time </th>
				<th> BillId </th>
				<th> Pt ID </th>
				<th> Amount </th>
			</tr>

			@foreach($bill as $r)
				@if( $r->Eid == Auth::user()->id )
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
						<td> {{$r->Pid}} </td>
						<td> Rs: {{$r->BillAmount}} </td>
					</tr>
				@endif
			@endforeach

@endsection