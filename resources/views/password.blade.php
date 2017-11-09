@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<form action="/editps" style="margin-top: 160px" method="post">
			    <table>
				  <div class="container">
					{{ csrf_field() }}
				        <label><b style="color:red; padding-left:350px">Old Password</b></label>
				        <input id="password" type="password"  name="old" required><br><br>

				        <label><b style="color:red; padding-left:350px">New Password</b></label>
				        <input id="password" type="password"  name="new" required><br><br>


				        <input type="Submit" class="btn" name="Submit" value="submit" style="margin-left: 450px;">
					</div>
				</table>
			</form>
		</div>
	</div>
@endsection