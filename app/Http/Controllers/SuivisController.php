<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NouveauSuiveurMail;
use App\Utilisateur;

class SuivisController extends Controller
{
	/*build follow configatil'
	 *
	 * @return back
	 */

	public function nouveau()
	{
		$utilisateurQuiVaSuivre=auth()->user();
		$utilisateurQuiVaEtreSuivi=Utilisateur::where('email',request('email'))->firstOrFail();

		$utilisateurQuiVaSuivre->suivis()->attach($utilisateurQuiVaEtreSuivi);

		flash("Vous  suivez maintenant $utilisateurQuiVaEtreSuivi->email")->success();
		Mail::to($utilisateurQuiVaEtreSuivi)->send(new NouveauSuiveurMail);
		return back();
	
	}

	public function enlever()
	{

		$utilisateurQuiSuit=auth()->user();
		$utilisateurQuiEstSuivi=Utilisateur::where('email',request('email'))->firstOrFail();

		$utilisateurQuiSuit->suivis()->detach($utilisateurQuiEstSuivi);

		flash("Vous ne  suivez plus $utilisateurQuiEstSuivi->email")->success();
		return back();
	
	}

}
