@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<h2 class='text-center'> Drug Details </h2>
				

			<table class="table table-striped">
			<tr>
				<th> </th>
				<th> </th>
			</tr>
			@foreach($drug as $r)
			<tr>
				<td>&emsp; &emsp; &emsp; Drug Id : </td>
				<td> {{$r->DrugId}} </td>
			</tr>
			<tr>
				<td>&emsp; &emsp; &emsp; Drug Name : </td>
				<td> {{$r->DrugName}} </td>
			</tr>
			<tr>
				<td>&emsp; &emsp; &emsp; Quantity Left : </td>
				<td> {{$r->Quantity}} </td>
			</tr>
			<tr>
				<td>&emsp; &emsp; &emsp; Price : </td>
				<td> Rs. {{$r->Price}} </td>
			</tr>
			<tr>
				<td>&emsp; &emsp; &emsp; Entered On : </td>
				<td> {{$r->created_at}} </td>
			</tr>
			<tr>
				<td>&emsp; &emsp; &emsp; Last Sold On : </td>
				<td> {{$r->updated_at}} </td>
			</tr>

			@endforeach
		</table>
		<br>
		@foreach($drug as $r)
		<h2 class='text-center'>{{$r->DrugName}}'s Recent History </h2>
		@endforeach
			<br>

			<table class="table table-striped">
			<tr>
				<th> Date </th>
				<th> Time </th>
				<th> BillId </th>
				<th> Amount </th>
				<th> Billed by</th>
			</tr>
			@foreach($dib as $r)
				@foreach($bill as $s)
					@if($r->Billid == $s->BillId)
						<tr>
							<td> {{substr($r->created_at,0,10)}} </td>
							<td> {{substr($r->created_at,11)}} </td>
							<td>
							<form action="/search3" method="post">
								{{ csrf_field() }}
								<input style="width:50px" value={{$r->Billid}} name="did"  >
								<input type="Submit"  name="Submit" value="check" style="
			        background-color: green;
			        color: black;
			        border: none;
			        cursor: pointer;
			        width: 15%;
			        height:1%">
							</form>
							</td>
							<td> Rs: {{$s->BillAmount}} </td>
							<td> 
							@foreach($user as $t)
								@if($t->id == $s->Eid)
									{{$t->name}}
								@endif
							@endforeach
							</td>
						</tr>
					@endif
				@endforeach
			@endforeach
		</table>
	</div>
</div>


@endsection