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
									echo floor((($us->points)-(($us->points)*0.2))/30)
								?>
								</div>
						</div>
					</div>
					</a>
					@endforeach
				</div>
			</div>
			<div class="col-md-9">
				<div class="profileCont">
					<!--Perfil-->
					<div class="row">
						<div class="col-md-3">
							<img src="{{$user->image}}" style="display:block;margin:auto" width="200px" height="200px" alt="" class="user_pp">
							<div style="text-align:center;margin-top:5px"></div>
						</div>
						<div class="col-md-5" style="padding-left:20px">
							<h2 >
								{{$user->name}}
							</h2>
							<h4>Level <?php echo floor((($user->points)-(($user->points)*0.2))/30)?>				
							</h4>
							<p>{{$user->description}}</p>

						</div>
						<div class="col-md-4">
							<div class="medalCont">
								<img  src="http://orig15.deviantart.net/9d08/f/2012/235/4/5/badge_habbo_cool_by_winxou-d5c5pbx.jpg" class="medal" data-toggle="tooltip" title="Por ser super cool!" data-placement="left">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6XfyEdlcwg-XATFZNqEdpxUguWE7JXK-q-r22azp2y2Kh2oaK" class="medal" data-toggle="tooltip" title="Hooray!" data-placement="left" >
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6XfyEdlcwg-XATFZNqEdpxUguWE7JXK-q-r22azp2y2Kh2oaK" class="medal" data-toggle="tooltip" title="Hooray!" data-placement="left" >
								<img src="https://devbest.com/data/attachments/3/3435-5e11269eab2f646aed8849cfd7ab40e2.jpg" class="medal" data-toggle="tooltip" title="Hooray!" data-placement="left" >
								<img src="http://rs872.pbsrc.com/albums/ab284/Habbocentrum/DEO.gif~c200" class="medal" data-toggle="tooltip" title="Hooray!" data-placement="left" >
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6XfyEdlcwg-XATFZNqEdpxUguWE7JXK-q-r22azp2y2Kh2oaK" data-toggle="tooltip" title="Hooray!" data-placement="left"  class="medal">
								<img src="http://orig15.deviantart.net/9d08/f/2012/235/4/5/badge_habbo_cool_by_winxou-d5c5pbx.jpg" class="medal">
								<img src="https://hydra-media.cursecdn.com/habbo.gamepedia.com/5/5a/BR059.gif?version=e41586640ceb56dc6a24fe2b9bd370b0" class="medal">
								<img src="http://ekladata.com/7k6MaEVMghNL-e0PAFoePz76alE@200x200.gif" class="medal">
								<img src="https://habboo-a.akamaihd.net/c_images/album1584/UK103.gif" class="medal">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6XfyEdlcwg-XATFZNqEdpxUguWE7JXK-q-r22azp2y2Kh2oaK" class="medal">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6XfyEdlcwg-XATFZNqEdpxUguWE7JXK-q-r22azp2y2Kh2oaK" class="medal">
							</div>
						</div>
					</div>


					<!--PROGRESO-->
					<div class="row">
						<!--Titulos de barras-->
						<div class="col-md-4 titulosprogress">
							<h4>Progress until level {{floor((($user->points)-(($user->points)*0.2))/30)+1}} </h4> 
						</div>
						<!--barras-->
						<div class="col-md-8">
							<div class="progress">
								
								<?php 
									$aux= floor((($user->points)-(($user->points)*0.2))/30);
									$aux= ((($user->points)+(($user->points)*0.2))/30)+30;
								?>
						  <div class="progress-bar pbb" role="progressbar" aria-valuenow="70"
						  aria-valuemin="0" aria-valuemax="100" style="width:{{$aux*1.3}}%">
						  {{$aux*1.3}}%
						    <span class="sr-only">{{$aux*1.3}}% Complete</span>
						  </div>
						</div>
						<div class="clear">
						</div>
						</div>
						
					</div>
				</div>
				<!--Actividades y comisiones-->
				<div class="row">
					<div class="col-md-6">
						<h4>Recent activity</h4>
						<div class="profilebtmcont">
							<div class="user_m participacion">
								<div class="user_name">+15 - Participó en Bienvenida FCFM</div>
							</div>
							<div class="user_m participacion">
								<div class="user_name">+10 - Participó en FCFM Canta / MISS FCFM</div>

							</div>
							<div class="user_m participacion">
								<div class="user_name">+7 - Limpieza del jueves</div>

							</div>
							<div class="user_m participacion">
								<div class="user_name">+15 - Participó en Bienvenida FCFM</div>
							</div>
							<div class="user_m participacion">
								<div class="user_name">+10 - Participó en FCFM Canta / MISS FCFM</div>

							</div>
							<div class="user_m participacion">
								<div class="user_name">+7 - Limpieza del jueves</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
<!--
@section('modal')
@endsection*-->