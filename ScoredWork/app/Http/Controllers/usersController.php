<?php

namespace App\Http\Controllers;
// use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Session;
use App\Http\Requests;
use App\User;
use App\level;
use App\Event;

class usersController extends Controller
{
	public function index(){
		return view(‘insert’);
	}
	
	public function create(){
		//
	}
	
	public function store(Request $request){
		$user = new user;
		$user->name=$request->name;
		$user->save();
	}
	
	public function show(){
		if(!Session::has("idUser"))
			return view("welcome");
		$users = DB::table('users')->get();
		//return view('workboard', ['user' => $users]);
		
		$usuariosporpuntos = \DB::table('users')
            ->selectRaw('users.*')
            ->orderBy('points', 'desc')
            ->get();
        $events = \DB::table('events')
        	->selectRaw('events.*')
        	->orderBy('created_at')
        	->paginate(6);
        	
        $levels = \DB::table('levels')
        	->selectRaw('levels.*')
        	->orderBy('level','asc')
        	->get();
		//$myId=Session::get('idUser');
		//return $myId['id'];
         return view('workboard', compact('users','usuariosporpuntos','events','levels'));
	}
	
	public function profile(Request $request){
		if(!Session::has("idUser"))
			return view("welcome");
			
		$this->validate($request, [
   		'id' => 'required'
   		]);
		$myid = $request["id"];
		
		$user = User::find($myid);
		
		$usuariosporpuntos = \DB::table('users')
            ->selectRaw('users.*')
            ->orderBy('points', 'desc')
            ->get();

					
         return view('profile')->with('user', $user)->with('usuariosporpuntos',$usuariosporpuntos);
         //return view('profile', compact('user'));
	}
    
}
