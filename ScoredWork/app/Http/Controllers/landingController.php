<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

use App\User;

class landingController extends Controller
{
	public function do($request){
		if(isset($request['birthday']))
			registrar($request);
		else
			loggear($request);
			
	}
    public function registrar(Request $request)
    {
        //TODO: 
        //  *validación de campos
        
        $this->validate($request, [
   		'name' => 'required',
   		'email' => 'required',
   		'pw' => 'required'
   		   		]);
   		   		
   		   		
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->pw);
        $usuario->points = 0;
        $usuario->birthday = $request->birthday;
        
		
        	
		$file = array('image' => Input::file('image'));
		 $rules = array('image' => 'required',);
		 $validator = Validator::make($file, $rules);
		  if ($validator->fails()) {
			  Session::flash('error', 'Something went wrong');
		    return view('welcome');
		  }
		  else {
		    // checking file is valid.
		    if (Input::file('image')->isValid()) {
		      $destinationPath = 'images'; // upload path
		      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
		      $fileName = rand(11111,99999).'.'.$extension; // renameing image
		      
      $filepath=$destinationPath."/".$fileName;
      $usuario->image=$filepath;
      			$event->save();
		      Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
		      // sending back with message
		      Session::flash('success', 'Upload successfully'); 
		      return redirect('/workboard');
		    }
		    	else {
		      // sending back with error message.
		      	Session::flash('error', 'uploaded file is not valid');
			  	return redirect('/welcome');
		    	}
  			}
  			
        //$user = \DB::table('users')->orderBy('id','desc')->limit(1)->get();
        //Session::put('idUser',$user);
        
        $usuario->save();
        Auth::login($usuario);
        $usuario = \DB::table('users')
            ->selectRaw('users.*')
            ->where('email',$request->email)
            ->get();
			Session::put("idUser",$usuario[0]);
			
        return redirect('/workboard');
    }
    public function loggear(Request $request)
    {
		if(empty($request['birthday'])){
        $this->validate($request, [
   		'email' => 'required|email',
   		'pw' => 'required'
   		]);
	   	$email = $request["email"];
	   	$pass = $request["pw"];
	   	
	   	if (Auth::check())
		{
		    Auth::logout();
		}
   		if(Auth::attempt(['email' => $email, 'password' => $pass ])){
	   		$usuario = \DB::table('users')
            ->selectRaw('users.*')
            ->where('email',$email)
            ->get();
			Session::put("idUser",$usuario[0]);         
   			return redirect('/workboard');
   		}
   		else{
   			return redirect()->back();
   		}
    }
    else{
	    $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->pw);
        $usuario->points = 0;
        $usuario->birthday = $request->birthday;
        $usuario->description = $request->description;
        
		
        	
		$file = array('image' => Input::file('image'));
		 $rules = array('image' => 'required',);
		 $validator = Validator::make($file, $rules);
		  if ($validator->fails()) {
			  Session::flash('error', 'Something went wrong');
		    return view('welcoome');
		  }
		  else {
		    // checking file is valid.
		    if (Input::file('image')->isValid()) {
		      $destinationPath = 'images'; // upload path
		      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
		      $fileName = rand(11111,99999).'.'.$extension; // renameing image
		      
      $filepath=$destinationPath."/".$fileName;
      $usuario->image=$filepath;
		      Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
		      // sending back with message
		      Session::flash('success', 'Upload successfully'); 
		      //return redirect('/workboard');
		    }
		    	else {
		      // sending back with error message.
		      	Session::flash('error', 'uploaded file is not valid');
			  	//return redirect('/welcomee');
		    	}
  			}
  			
        //$user = \DB::table('users')->orderBy('id','desc')->limit(1)->get();
        //Session::put('idUser',$user);
        
        $usuario->save();
        Auth::login($usuario);
        $usuario = \DB::table('users')
            ->selectRaw('users.*')
            ->where('email',$request->email)
            ->get();
			Session::put("idUser",$usuario[0]);
			
        return redirect('/workboard');
    }
    }
    
}
