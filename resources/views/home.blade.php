@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid">
                        <a href="/createbill" title="create bill"> <img src="img5.png" style="width:200px; height:200px; margin-top:150px;  margin-left:250px; margin-bottom:10px"> </a>
                        <a href="#" title="Search options"> <img src="img6.jpg" style="width:200px; height:200px; margin-top:150px;  margin-left:250px; margin-bottom:10px"> </a>
                        <a href="#" title="Recent History"> <img src="img8.png" style="width:200px; height:200px; margin-top:40px;  margin-left:250px; margin-bottom:10px"> </a>
                        <a href="#" title="Status of drugs"> <img src="img9.png" style="width:200px; height:200px; margin-top:40px;  margin-left:250px; margin-bottom:10px"> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
