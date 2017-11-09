@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<form action="/editpr" style="margin-top: 160px"  method="post">
			    <table>
				  <div class="container">
					{{ csrf_field() }}
				        <label><b style="color:red; padding-left:350px">New UserName</b></label>
				        <input name="name" required ><br><br>

				        <label><b style="color:red; padding-left:350px">New Email Id</b></label>
				        <input name="email" required><br><br>

				        <input type="Submit" class="btn" name="Submit" value="submit" style="margin-left: 450px;">
					</div>
				</table>
			</form>
		</div>
	</div>
@endsection