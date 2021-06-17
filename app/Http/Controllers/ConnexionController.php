<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class ConnexionController extends Controller
{

	public function formulaire()
	{

		if (!auth()->guest())
		{
		
			return redirect('/mon-compte');
		
		}


		return view('connexion');

	
	}

	public function traitement()
	{

		request()->validate([
			'email'=>['required','email'],
			'password'=>['required'],
		
		]);


		$resultat=auth()->attempt([
			'email'=>request('email'),
			'password'=>request('password'),
		
		]);

		if ($resultat){

			flash('Vous êtes maintenant connecté')->success();
			return redirect('/mon-compte');
		
		}
		else{
			return back()->withInput()->withErrors([
			'email'=>'Vos identifiants sont incorrectes']);
		
		}



		return "traitement formulaire connexion";




	}
}
