@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<h3> &emsp;Bill ID: {{$bill->BillId}} &emsp; &emsp;  
				@foreach($pt as $r)
					@if($r->Ptid==$bill->Pid)
						Pt Id:{{$r->Ptid}} &emsp; &emsp;Pt Name:{{$r->PName}}
					@endif
				@endforeach
				&emsp; &emsp; Billed By: 
				@foreach($user as $r)
					@if($r->id==$bill->Eid)
						{{$r->name}}
					@endif
				@endforeach
				&emsp; &emsp; Billed On: &emsp;{{$bill->created_at}}
			</h3>
			
			<br>

			<table class="table table-striped">
			<tr>
				<th> Drug ID  </th>
				<th> Drug Name</th>
				<th> Price </th>
				<th> Quantity </th>
				<th> Amount </th>
			</tr>
			@foreach($dib as $r)
				<tr> 
				<?php $a=0; ?>
				@if($r->Billid==$bill->BillId)
					<td> {{$r->Drugid}} </td>
					@foreach($drug as $q)
						@if($q->DrugId==$r->Drugid)
							<td> {{$q->DrugName}} </td>
							<td> {{$q->Price}} </td>
							<?php $a=$q->Price; ?>
						@endif
					@endforeach
					<td> {{$r->Quantity}} </td>
					<td> {{$r->Quantity * $a}} </td>
				@endif
			</tr>
			@endforeach
			<tr>
					<td>  </td>
					<td>  </td>
					<td>  </td>
					<td> Grand Total </td>
					<td> {{$bill->BillAmount}} </td>
				</tr>

		</table>
	</div>
</div>
@endsection