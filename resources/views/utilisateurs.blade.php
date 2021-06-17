@extends('layout')

@section('contenu')

<div class="section">
	<h1 class="title is_1">Bienvenue</h1>

	@auth
	<section class="section">
		<h2 class="title is_2">Les utilisateur suivis</h2>

		<ul>
			@forelse (auth()->user()->suivis  as $utilisateur)
			<li>
				<a href="/{{$utilisateur->email}}">{{$utilisateur->email}}</a>
			</li>
			@empty
				<p>Vous ne suivez aucun utilisateur</p>
			@endforelse
		</ul>
	</section>
	@endauth


	<section class="section">
		<h2 class="title is_2">Tous les utilisateurs</h2>

		<ul>
			@foreach ($utilisateurs as $utilisateur)
			<li>
				<a href="/{{$utilisateur->email}}">{{$utilisateur->email}}</a>
			</li>
			@endforeach
		</ul>

	</section>

</div>
@endsection
