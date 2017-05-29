<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\Http\Requests;

class pageController extends Controller
{
    public function getIndex(){
    	return view('welcome');
    }
    public function getWorkBoard(){
    	return view('workboard');
    }
    public function admin(){
	    
		$usuariosporpuntos = \DB::table('users')
            ->selectRaw('users.*')
            ->orderBy('points', 'desc')
            ->get();
        $levels = \DB::table('levels')
        	->selectRaw('levels.*')
        	->orderBy('level','asc')
        	->get();
        	
        	$levels = \DB::table('levels')
        	->selectRaw('levels.*')
        	->orderBy('level','asc')
        	->get();
         return view('admin', compact('usuariosporpuntos','levels'));
    }
    
    public function logout(){
	    
		Session::flush();
         return view('welcome');
    }
}
