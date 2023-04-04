@extends('layouts.app')

@section('container')
<main class="home">
		@if (session()->has('success'))
				<div class="flash-message success">
						<p>{{ session('success') }}</p>
				</div>
		@endif

		@if (session()->has('error'))
				<div class="flash-message error">
						<p>{{ session('error') }}</p>
				</div>
		@endif

		<div class="home__card">
				<h2 class="home__card__title">Login</h2>

				<form class="form-login" action="/login" method="post">
						@csrf

						<div class="form__group">
								<label class="form__label" for="form__username">Username</label>
								<input class="form__input" id="form__username" type="text" name="username" required>

								@error ('username')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<div class="form__group">
								<label class="form__label" for="form__username">Password</label>
								<input class="form__input" id="form__password" type="password" name="password" required>

								@error ('message')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<button class="form__button" type="submit">Login</button>
						<p class="form-register__login"><small>Or don't have an account?, <a href="/">register here</a></small></p>
				</form>
		</div>
</main>
@endsection
