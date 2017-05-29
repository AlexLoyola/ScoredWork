@extends('master')

@section('styles')
<style type="text/css">
html, body{
	height:100%;
	background-color: rgba(0,0,0,0.03);
}
a:hover{
	cursor: pointer;
}
.container{
}

</style>
@endsection

@section('content')

<div class="row fullheight">
		<h2>
		<span class="glyphicon glyphicon-menu-right"></span>
		Sociedad de Alumnos FCFM #Include
		</h2>
			<div class="col-md-3">
			<h4>Members</h4>
				<div class="members">
					@foreach ($usuariosporpuntos as $us)
					<a href="profile?id={{$us->id}}">
					<div class="user_b">
						<div class="user_m">
							<img src="{{$us->image}}" width="32" height="32" alt="" class="user_img">
							
								<div class="user_name">
									
									{{$us->name}}
									
								</div>
							<div class="user_lvl" style="background-color:rgba(50,200,50,{{$us->points * 0.002}})">
								<?php 
									$isprinted=0;
									foreach($levels as $lvl){
										$upoints = $us->points;
										$lpoints = $lvl->points;
										if($upoints<=$lpoints and $isprinted==0){
											echo $lvl->level;
											$isprinted=1;
											}
											
									}
									
								?>
								</div>
						</div>
					</div>
					</a>
					@endforeach
				</div>
			</div>
			<div class="col-md-7">
				<div class="groupCont">
					<div style="background-color:rgba(0,0,0,0.1);padding:3px;">
						<h3>Administrator panel</h3>
					</div>
					<div class="Group" style="height:80%">
						<div class="col-md-6">
								{!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true)) !!}
								<?php
									if(isset($event))
									echo "<input type='hidden' name='action' value='update'/>";
									else
									echo "<input type='hidden' name='action' value='upload'/>";
									
									if(isset($event))
									echo "<input type='hidden' name='idEvento' value=".$event->id;
								?>
								<h3>Title:</h3>
								<input type="text" name="title" class="form-control" placeholder="What event is it?" value="<?php if(isset($event)) echo $event->title?>"/>
								<h3>Description:</h3>
								<textarea type="text" name="description" class="form-control" placeholder="How awesome will it be?" ><?php if(isset($event)) echo $event->description?></textarea>
								<br/>
								{!! Form::file('image') !!}
							{!! Form::submit('Post event', array('class'=>'btn btn-default')) !!}
							{!! Form::close() !!}
								@if(Session::has('error'))
								<p class="errors">{!! Session::get('error') !!}</p>
								@endif
								@if(Session::has('success'))
						          <div class="alert-box success" style="background-color: #59d459">
						          <h2>{!! Session::get('success') !!}</h2>
						          </div>
						        @endif
						</div>
						<div class="col-md-5">
							<h4>Confirm work participation</h4>
							<h5>MISS FCFM</h5>
									<div class="user_m participacion">
										<span class="glyphicon glyphicon-ok"></span>
										<span class="glyphicon glyphicon-remove"></span>
										<img src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-1/p32x32/17498987_10155865058740828_3330858158096846600_n.jpg?oh=5a877a211c65f45420819c3ce4674880&amp;oe=598564ED" width="32" height="32" alt="" class="user_img">
										<div class="user_name">Charly. </div>
									</div>
									<div class="user_m participacion">
										<span class="glyphicon glyphicon-ok"></span>
										<span class="glyphicon glyphicon-remove"></span>
										<img src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-1/p32x32/13891962_10210377152129518_109892762524592637_n.jpg?oh=a96c834dfc13138059e6d48b7a74023e&oe=5995EF11" width="32" height="32" alt="" class="user_img">
									<div class="user_name">Arcelia</div>
									</div>
							<h5>Evento Bienvenida</h5>
							<div class="user_m participacion">
										<span class="glyphicon glyphicon-ok"></span>
										<span class="glyphicon glyphicon-remove"></span>
										<img src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-1/p32x32/13891962_10210377152129518_109892762524592637_n.jpg?oh=a96c834dfc13138059e6d48b7a74023e&oe=5995EF11" width="32" height="32" alt="" class="user_img">
									<div class="user_name">Arcelia</div>
									</div>
									<div class="user_m participacion">
									<span class="glyphicon glyphicon-ok"></span>
										<span class="glyphicon glyphicon-remove"></span>
									<img src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-1/p32x32/17904439_10202877113445915_878310507760496681_n.jpg?oh=681ed1a703f5034d14c16a8245f134f9&oe=5993C636" width="32" height="32" alt="" class="user_img">
									<div class="user_name">Arturo</div>
								</div>
									<div class="user_m participacion">
										<span class="glyphicon glyphicon-ok"></span>
										<span class="glyphicon glyphicon-remove"></span>
										<img src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-1/p32x32/17498987_10155865058740828_3330858158096846600_n.jpg?oh=5a877a211c65f45420819c3ce4674880&amp;oe=598564ED" width="32" height="32" alt="" class="user_img">
										<div class="user_name">Charly. </div>
									</div>
									
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection