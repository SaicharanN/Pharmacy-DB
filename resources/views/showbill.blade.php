@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<h3 class='text-center'> Bill Receipt </h3>	
			<br>

			<table class="table">
			<tr>
				<th> Drug Id </th>
				<th> Drug Name </th>
				<th> Price</th>
				<th> Quantity </th>
				<th> Amount </th>
			</tr>
			
				<?php $i=0; $cnt=0.0; ?>
				@foreach($ids as $r)
				
				<tr>
					<td> {{$r->DrugId}} </td>
					<td> {{$r->DrugName}} </td>
					<td> {{$r->Price}} </td>
					<td> {{$quan[$i]}} </td>
					<?php $cnt += ($r->Price * $quan[$i]); ?>
					<td> {{$r->Price * $quan[$i++]}} </td>
				</tr>
				
				@endforeach
				<tr>
					<td>  </td>
					<td> </td>
					<td>  </td>
					<td> Grand Total </td>
					<td> {{$cnt}} </td>
				</tr>	
				
			
				
			
			</table>
		</div>
	</div>


@endsection