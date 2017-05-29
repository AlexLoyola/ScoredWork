<!DOCTYPE html>
<html>
<head>
<title>Landing Page</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	 <meta name="csrf-token" content="{{ csrf_token() }}" />
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" type="text/css" href="/css/main.css"/>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script type="text/javascript" src="js/functions.js">
	</script>
	<script src="{{ asset('js/functions.js') }}"></script>
	<style>
	@yield('styles')
	</style>
	<style>
		@media screen and (max-width: 600px) {
			.members{
				 height:120px;
				 overflow: scroll;
					}
			}	
       #map {
        height: 400px;
        width: 100%;
       }
	</style>
	
</head>
<body>
    <?php
	    use Illuminate\Support\Facades\Session;
	   ?>
	   	@if(Session::has("idUser"))
<div class="navbar navbar-default navbar-fixed-top" role="navigation"> 
	<div class="container">
		<div class="navbar-header"> 
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index"><span><img src="images/logo.png" width="150px"/></span></a>
		</div>
		<div class="navbar-collapse collapse"> 
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/workboard">Events</a></li>
				<li><a href="profile?id={{Session::get("idUser")->id}}">My Profile</a></li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a> 
					<ul class="dropdown-menu">
						<li class="dropdown-header">Admin dashboard</li>
						<li><a href="admin">Administrator Panel</a></li>
						<li class="dropdown-header">Settings</li>
						<li><a href="logout">Log out</a></li>
					</ul>
				</li>
			</ul>
		</div>
		
		
	</div>
</div>
@endif
<script>
	$("li").click(function(){
		var now= $(this);
		$("li").each(function(){$(this).removeClass("active")});
		now.addClass("active");
		});
	</script>
			   
			   
			   
			
	<div class="container " @yield('otherClass')>
		@yield('content')
	</div>
	@yield('modal')
	<script>
	@yield('javascript')
	</script>
</body>
</html>





