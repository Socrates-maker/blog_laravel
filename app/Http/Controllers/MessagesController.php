<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
	public function nouveau()
	{

		if (auth()->guest())
		{
			flash('Vous devez vous connecter pour voir cette page')->error();
			return redirect('/connexion');
		
		}

		request()->validate([

			'message'=>['required'],
		
		]);


		Message::create([

			'utilisateur_id'=>auth()->id(),
			'contenu'=>request('message'),
		]);

		flash('Votre message a été bien envoyé')->success();
		return back();

	}
}
