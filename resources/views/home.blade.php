@extends('layouts.app')

@section('content')


<div style="background-image: url('img3.jpg'); margin-top: -30px">
<div class="container" >
    <br><br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <div class="row">
                        <div class="col-md-6">
                           <a href="/createbill" title="create bill"> <img src="img5.png"  class="thumbnail" style="width:200px; height:200px; margin-top:0px; margin-left:110px;   margin-bottom:40px"> </a>
                        </div>
                         <div class="col-md-6">     
                            <a href="/search" title="Search options"> <img src="img6.jpg" class="thumbnail" style="width:200px ; height:200px; margin-top:0px;  margin-bottom:40px"> </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <a href="/history" title="Recent History"> <img src="img8.png"  class="thumbnail" style="width:200px; height:200px; margin-top:0px; margin-left:110px;   margin-bottom:10px"> </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/adddrug" title="Entry of drugs"> <img src="img10.png" class="thumbnail" style="width:200px ; height:200px; margin-top:0px;  margin-bottom:10px"> </a>
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<br> 
 
</div>
@endsection
