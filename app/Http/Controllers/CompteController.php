<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class CompteController extends Controller
{
	public function acceuil()
	{

		if (! auth()->check())
		{
			flash('Vous devez vous connecter pour acceder à cette page')->error();
			return redirect('/connexion') ;
		}

		return view('/mon-compte');

	}


	public function deconnexion()
	{
		auth()->logout();

		flash('Vous êtes deconnecter ')->success();

		return redirect('/connexion');
	}

	public function modificationMotDePasse()
	{
		if (auth()->guest())
		{

			flash('Vous devez vous connecter d\'abord')->error();

			redirect('/connexion');
		}

		request()->validate([

			'password'=>['required','confirmed','min:8'],
			'password_confirmation'=>['required'],
		
		]);

		$resultat=auth()->user()->update([
			'mot_de_passe'=>bcrypt(request('password')),
		]);

		if ($resultat){
			flash('Mot de passe mis à jour')->success();

			return redirect('/mon-compte');

		
		}

	
	}



}
