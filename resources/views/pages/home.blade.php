@extends('layouts.app')

@section('container')
<main class="home">
		@if (session()->has('error'))
				<div class="flash-message error">
						<p>{{ session('error') }}</p>
				</div>
		@endif

		<div class="home__card">
				<h2 class="home__card__title">Anonym message</h2>
				
				<ul>
						<li class="home__card__text">Get anonym message from your friend for fun</li>
				</ul>

				<form class="form-register" action="/register" method="post">
						@csrf

						<div class="form__group">
								<label class="form__label" for="form__name">Name</label>
								<input class="form__input" id="form__name" type="text" name="name" maxlength="50" required>
								
								@error ('name')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<div class="form__group">
								<label class="form__label" for="form__username">Username</label>
								<small class="form__label__detail">Minimum 4 and maximum 20 characters</small>
								<input class="form__input" id="form__username" type="text" name="username" minlength="4" maxlength="20" required>

								@error ('username')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<div class="form__group">
								<label class="form__label" for="form__username">Password</label>
								<small class="form__label__detail">Minimum 8 characters</small>
								<input class="form__input" id="form__password" type="password" name="password" minlength="8" maxlength="255" required>

								@error ('password')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<p class="form__password__note"><small>*Note: This site doesn't have forgot password feature so please keep safe your password</small></p>
						<button class="form__button" type="submit">Register</button>
						<p class="form-register__login"><small>Or already have an account?, <a href="/login">login here</a></small></p>
				</form>
		</div>
</main>
@endsection
