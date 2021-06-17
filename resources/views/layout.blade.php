<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
	<head>
		<meta charset="utf-8">
        	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.css" />	
	</head>
	<body>
		<nav class="navbar is-light" >
			<div class="navbar-menu is-active ">
				<div class="navbar-start">
					@include('partiel.navbar',[$lien ='/',$texte='Acceuil'])
					@auth

						@include('partiel.navbar',[$lien=auth()->user()->email,$texte=auth()->user()->email])
					@endauth
				</div>
				<div class="navbar-end">
					@auth 
				
						@include('partiel.navbar',[$lien ='mon-compte',$texte='Mon compte'])
					
						@include('partiel.navbar',[$lien ='deconnexion',$texte='Deconnexion'])
					@else
				     
						@include('partiel.navbar',[$lien ='connexion',$texte='Connexion'])
					
						@include('partiel.navbar',[$lien ='inscription',$texte='Inscription'])
					@endauth
				</div>
			</div>

		</nav>

		<div class="container">
        		@include('flash::message')
			@yield('contenu')
		</div>

	</body>

</html>
