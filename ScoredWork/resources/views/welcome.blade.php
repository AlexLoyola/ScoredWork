@extends('master')

@section('styles')
	@media screen and (max-width: 800px) {
			.textbox{
				 visibility: hidden;
		    clear: both;
		    float: left;
		    margin: 10px auto 5px 20px;
		    width: 28%;
		    display: none;
					}
			}	
			
	@media screen and (max-width: 600px) {
			.floatingContainer{
				 width:100%;
					}
			}	
@endsection


@section('otherClass')
	style="background-image:url(https://www.michiganstateuniversityonline.com/media/12048556/teamwork-in-culture.jpg);"
@endsection

@section('content')
<div class="row" style="margin-botton:40px;">
			<div class="col-md-6 textbox" style="text-align: justify;text-justify: inter-word; background-color:black;opacity:0.8;color:white">
				<br/><br/><br/><br/><br/><br/><br/><br/>
				<h1>Manage your team's activities and score the work for motivation!</h1>
			</div>
			<div class="col-md-6">
			<div id="space"></div>
				<div class="floatingContainer">
					<img src="images/logo.png" class="img-responsive center-block">
					<img src="images/SWlogo.png" class="img-responsive center-block">
					<h5>Score points and level up by being active in your team work</h5>
					{!! Form::open(array('url'=>'log','method'=>'POST', 'files'=>true)) !!}
							{!! Form::file('image') !!}
					<!--FORM START-->
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
						<input type="text" id="fullname" name="name" class="form-control" placeholder="Full Name" aria-describedby="basic-addon1"  style="display:none">
						<input type="password" class="form-control" name="pw" placeholder="Password" aria-describedby="basic-addon1">
						<div class="input-group date hideDplr" data-provide="datepicker">
							<input type="text" name="birthday" id="datepicker1" class="form-control">
						    <div class="input-group-addon hideDplr" >
						        <span class="glyphicon glyphicon-th"></span>
						    </div>
						</div>
													<input type="text" id="description" name="desription" class="form-control" placeholder="About you..." aria-describedby="basic-addon1">

						<div id="piclr" class="btn btn-default">Picture</div>
						<br/>
						<br/>
						
						<hr/>
						<input type="hidden" name="action" id="action" value="in">
					{!!Form::submit('Sign in!', ['class' => 'btn btn-default','id'=>'btnLogReg']);!!}
					<br/>
					<a class="newacc" style="cursor: pointer">Already have an account? Sign in</a>
						@if(Session::has('error'))
						<p class="errors">{!! Session::get('error') !!}</p>
						@endif
					<!--FORM END-->
					{!! Form::close() !!}

				</div>
			</div>
		</div>
@endsection
@section('javascript')
	$(document).ready(function(){
		$("a.newacc").click(function(){
		var actual = $("#btnLogReg").text();
		if(actual=="Sign in"){
			$("#description").slideToggle();
			$("#action").val("up");
			$("button").text("Sign up");
			$("#piclr").slideToggle();
			$(".hideDplr").slideToggle();
			$("a.newacc").html("Already have an account? Sign in");
			$("#fullname").slideToggle();
		}
		else{
			$("#description").slideToggle();
			$("#action").val("in");
			$("button").text("Sign in");
			$(".hideDplr").slideToggle();
			$("#piclr").slideToggle();
			$("a.newacc").html("Don't have an account? Sign up");
			$("#fullname").slideToggle();

		}
		
	});
	
		$("#piclr").hide();
		var size=($(document).height());
		$("input[name='image']").attr("style","position:absolute;z-index:-1");
		$(".row").attr("style","height:"+size+"px");
		$("#piclr").click(function(event){
			$("input[name='image']").click();
			event.stopPropagation();
		});		
		$( function() {
		    $( "#datepicker1" ).datepicker({
		        changeMonth: true,
		        changeYear: true,
		        yearRange: '1920:2010',
		        dateFormat : 'dd-mm-yy',
		        defaultDate: new Date(1990, 00, 01)
		    });
		    
		  } );
	});
@endsection





