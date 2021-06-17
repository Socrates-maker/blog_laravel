@extends('layout')

@section('contenu')
<div class="section">

	<h1 class="title is-1">Mon compte</h1>


	<p>Vous êtes connectés</p>


</div>

<form action="/modification-mot-de-passe" method="post" class="section">
{{csrf_field()}}
	<div class="field">

		<label class="label">Nouveau mot de passe</label>

		<div class="control">
			<input type="password" class="input" name="password">

			@if ($errors->has('password'))
				<p>{{$errors->first('password')}}</p>

			@endif
		</div>
	</div>


	<div class="field">

		<label class="label">Mot de passe (confirmation)</label>

		<div class="control">
			<input type="password" class="input" name="password_confirmation">

			@if ($errors->has('password'))
				<p>{{$errors->first('password')}}</p>

			@endif
		</div>
	</div>


	<div class="field">
		<div class="control">
            		<button class="button is link" type="input">Modifier le mot de passe	                    </button>
		</div>
	</div>
</form>



@endsection
