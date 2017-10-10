@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<table class="table">
			<tr>
				<td> Drug Id </td>
				<td> Drug Name </td>
				<td> Price</td>
				<td> Quantity </td>
				<td> Amount </td>
			</tr>
			<tr>
				
				@for($i=0, $count = count($table);$i<$count;$i++)
				{
					<td>{{$table[$i]}}</td>
					<td>{{$quan[$i]}}</td>
					
				}
				@endfor
				
				</tr>
				
			
			</table>
		</div>
	</div>


@endsection