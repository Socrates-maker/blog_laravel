@extends('layout')

@section('contenu')

<form class="section" action="/connexion" method="post">
{{csrf_field()}}
	<div class="field">

		<label class="label">Addresse email</label>
		
		<div class="control">

		<input type="email" class="input" name="email"value={{old('email')}}>
		@if ($errors->has('email'))
		    <p class="help is-danger">{{$errors->first('email')}}</p>
		@endif

		</div>

	</div>

	<div class="field">

		<label class="label">Mot de passe</label>

		<div class="control">

			<input type="password" class="input" name="password">
		</div>
		@if ($errors->has('password'))
			<p class="help is-danger">{{$errors->first("password")}}</p>
		@endif

	</div>

	<div class="field">
	
		<div class="control">

			<button class="button is-link" type="submit" >Se connecter</button>
		
		</div>

	</div>

</form>
@endsection
