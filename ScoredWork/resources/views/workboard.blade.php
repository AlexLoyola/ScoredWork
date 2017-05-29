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

@section('javascript')
$(".actividades").on("click",".actividad",function(){
        var id= $(this).find(".selectedEvent").val();
        var param = { myId: id };
        
        $.ajax({
	        headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
	        method:"POST",
            url: '/findEvent',
            dataType: 'JSON',
            data: JSON.stringify(param),
            contentType: "application/json",
            
            success: function (data) {
	            $("#modalTitle").empty();
                $("#modalTitle").append(data['title']);
                $("#modalDescription").text(data['description']);
                $("#modalPoints").text(data['points']);
                $("#modalImage").attr("src",data['image']);
                $("#modalIdEvent").attr("value",data['id']);
                $("#eventoaeditar").attr("value",data['id']);
                
                
				 $('#myModal').modal(); 
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
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
			<div class="col-md-9 ">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
						<div style="background-color:rgba(0,0,0,0.1);padding:3px;">
							<h4>Work</h4>
						</div>
						
						<div class="actividades">
							
							@foreach($events as $e)
							<div class="actividad" style="background-image:url({{$e->image}});background-size: 200px;height:200px;">
							    <div class="actContenido">
							        <div class="table" style="background-color: rgba(255,255,255,0.8);border-radius: 5px">
							            <div class="table-cell" class="btn btn-info btn-lg eventModal" > 
								            <input type="hidden" class="selectedEvent" value="{{$e->id}}"/>
								            
								            {{$e->title}}
							            </div>

							        </div>
							    </div>
							</div>
							@endforeach
							
						</div>
						{{ $events->links() }}
						</div>
					</div>

				</div>
			</div>
		</div>
@endsection

@section('modal')
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalTitle">MISS FCFM / FCFM CANTA</h4>
        <div id="d"></div>
      </div>
      <div class="modal-body">
        <p id="modalDescription">Será el próximo viernes, ocupamos 15 miembros para staff.</p>
        <span></span><span><span id="modalPoints"></span> IESP</span>
        <form action="AppServices.inc.php" method="post"/>	     
	        <input type="hidden" name="action" value="apuntarParticipacion"/>
			<?php use Illuminate\Support\Facades\Session;
		   ?>
		   	@if(Session::has("idUser"))
	        <input type="hidden" name="idUser" value="{{Session::get("idUser")->id}}"/>
	        @endif
	        <input type="hidden" name="points" value="25"/>
	        <input type="hidden" id="modalIdEvent" name="idEvento"/>
	        <input type="submit" class="btn btn-default"/>
		</form>
		<form action="editarEvento">
			<input type="hidden" name="idEvento" id="eventoaeditar"/>
			<input type="submit" value="Editar"/>
		</form>
      
        <img id="modalImage" src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-9/16999056_1833490116870653_7618680343304144597_n.jpg?oh=b01ac2b873191b19e637aaff24ecb194&oe=59796EF1" style="margin-top:10px;width:100%">  
        <div style="height:40%; width:100%;">
	        <div id="map"></div>
    </div>
        <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 121.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
        </script>      
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUFBzb-SIbUCIJFDket6D0tgOwvn6ikNA&callback=initMap">
    </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection