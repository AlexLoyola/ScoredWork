<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Event;
use App\Http\Controllers\Redirect;
use App\Http\Requests;

class eventController extends Controller
{
	public function edit(Request $request){
	    if(!Session::has("idUser"))
			return view("welcome");
			
	    $this->validate($request, [
   		'idEvento' => 'required'
   		]);
		$myid = $request["idEvento"];
		$event = Event::find($myid);
		
		
		$usuariosporpuntos = \DB::table('users')
            ->selectRaw('users.*')
            ->orderBy('points', 'desc')
            ->get();
        $levels = \DB::table('levels')
        	->selectRaw('levels.*')
        	->orderBy('level','asc')
        	->get();
        	
		return view('admin', compact('usuariosporpuntos','levels','event'));
	}
    public function getEvent(Request $request){
	    if(!Session::has("idUser"))
			return view("welcome");
			
	    $this->validate($request, [
   		'myId' => 'required'
   		]);
		$myid = $request["myId"];
		$event = Event::find($myid);
		return $event;	
	}
	public function assist(Request $request){
		if(!Session::has("idUser"))
			return view("welcome");
			
	    $this->validate($request, [
   		'eventId' => 'required'
   		]);
		$eventId = $request["eventId"];
		$myId = Session::get("idUser");
		
		return "ok";
	}
	public function test(Request $request){
		$events = \DB::raw("select * from users");
		return $events;
	}
	public function upload(Request $request){
		if(!Session::has("idUser"))
			return view("welcome");
			
			
		$this->validate($request, [
   		'title' => 'required',
   		'description' => 'required'
   		   		]);
   		
   		if($request->action=="upload"){
   		$myTitle=$request["title"];
   		$myDesc=$request['description'];
   		
		$event = new Event();
		$event->title=$myTitle;
		$event->description=$myDesc;
		$usuariosporpuntos = \DB::table('users')
            ->selectRaw('users.*')
            ->orderBy('points', 'desc')
            ->get();
        $levels = \DB::table('levels')
        	->selectRaw('levels.*')
        	->orderBy('level','asc')
        	->get();
        	
		$file = array('image' => Input::file('image'));
		 $rules = array('image' => 'required',);
		 $validator = Validator::make($file, $rules);
		  if ($validator->fails()) {
		    return view('admin', compact('usuariosporpuntos','levels'));
		  }
		  else {
		    // checking file is valid.
		    if (Input::file('image')->isValid()) {
		      $destinationPath = 'images'; // upload path
		      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
		      $fileName = rand(11111,99999).'.'.$extension; // renameing image
		      
      $filepath=$destinationPath."/".$fileName;
      $event->image=$filepath;
      			$event->save();
		      Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
		      // sending back with message
		      Session::flash('success', 'Upload successfully'); 
		      return view('admin', compact('usuariosporpuntos','levels'));
		    }
		    	else {
		      // sending back with error message.
		      	Session::flash('error', 'uploaded file is not valid');
			  	return view('admin', compact('usuariosporpuntos','levels'));
		    	}
  			}
  		}
  		else{
	  		$usuariosporpuntos = \DB::table('users')
            ->selectRaw('users.*')
            ->orderBy('points', 'desc')
            ->get();
        $levels = \DB::table('levels')
        	->selectRaw('levels.*')
        	->orderBy('level','asc')
        	->get();
	  		$event = Event::find($request->idEvento);
	  		$event->title=$request->title;
	  		$event->description=$request->description;
	  		$event->save();
	  		Session::flash('success', 'Actualizado correctamente');
	  		return view('admin', compact('usuariosporpuntos','levels'));
  		}
	}
}
