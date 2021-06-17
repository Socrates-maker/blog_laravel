@extends('layout')

@section('contenu')

<form action='/inscription' method="post" class="section">

{{csrf_field()}}

	<div class="field">

		<label class="label">Addresse email</label>

		<div class="control">

			<input class="input" type="email" name="email" placeholder="Email" value="{{old('email')}}">

		</div>

		@if ($errors->has('email'))

			<p class="help is-danger">{{$errors->first('email')}}</p>

		@endif
	</div>


	<div class="field">

		<label class="label">Mot de passe</label>

		<div class="control">

			<input class="input" type="password" name="password" placeholder="Mot de passe">
		</div>

		@if ($errors->has('password'))
		
       			<p class="help is-danger">{{$errors->first('password')}}</p>
		@endif
	</div>

	<div class="field">
		<label class="label">Confirmer le mot de passe</label>
		<div class="control">
			<input class="input" type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)">
		</div>

		@if ($errors->has('password_confirmation'))
			<p class="help is-danger
">{{$errors->first('password_confirmation')}}</p>
		@endif
	</div>


	<div class="field">
		<div class="control">

			<button class="button is-link" type="submit">M'inscrire</button>
		
</div>
	</div>
</form>

@endsection
