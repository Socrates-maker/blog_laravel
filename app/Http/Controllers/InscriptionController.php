<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class InscriptionController extends Controller
{

	public function formulaire()
	{

		return view('inscription');
	
	}

	public function traitement()
	{

		
		request()->validate([

			'email'=>['required','email'],
			'password'=>['required','confirmed','min:8'],
			'password_confirmation'=>['required']
		],
		[
		'password.min'=>'Pour des raisons de securité, le mot de passe doit faire :min caractères'
	]);

	
		$utilisateur= Utilisateur::create([

		
			'email'=>request('email'),
			'mot_de_passe'=>bcrypt(request('password')),


		]);

		flash('Insciption reussie . Entrer votre email et votre mot de passe pour vous connecter')->success();
		return redirect('/connexion');
	
	}
}
