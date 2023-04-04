@extends('layouts.app')

@section('container')
<main class="home">
		@if (session()->has('success'))
				<div class="flash-message success">
						<p>{{ session('success') }}</p>
				</div>
		@endif

		<div class="home__card">
				<h2 class="home__card__title">Change Password</h2>

				<form class="form-change-password" action="/change-password" method="post">
						@csrf

						<div class="form__group">
								<label class="form__label" for="form__username">Password</label>
								<input class="form__input" id="form__username" type="password" name="current_password" required>

								@error ('current_password')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<div class="form__group">
								<label class="form__label" for="form__username">New password</label>
								<small class="form__label__detail">Minimum 8 characters</small>
								<input class="form__input" id="form__password" type="password" name="password" minlength="8" required>

								@error ('password')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<button class="form__button" type="submit">Change password</button>
						<p class="form-register__login"><small>Back to <a href="/dashboard">dashboard</a></small></p>
				</form>
		</div>
</main>
@endsection
