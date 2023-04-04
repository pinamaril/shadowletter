@extends('layouts.app')

@section('container')
<main class="home">
		@if(session()->has('success'))
				<div class="flash-message success">
						<p>{{ session('success') }}</p>
				</div>
		@endif

		@if(session()->has('error'))
				<div class="flash-message error">
						<p>{{ session('error') }}</p>
				</div>
		@endif

		<div class="home__card">
				<h2 class="home__card__title">Send anonym message to {{ $name }}</h2>

				<form class="form-message" action="/message" method="post">
						@csrf
						
						<input type="hidden" name="to_username" value="{{ $username }}">

						<div class="form__group">
								<label class="form__label" for="form-message__text">Message</label>
								<small class="form__label__detail">Minimum 10 and maximum 240 characters</small>
								<textarea class="form__textarea" id="form-message__text" name="text" minlength="10" maxlength="240" spellcheck="false" required></textarea>

								@error ('text')
										<p class="error"><small>{{ $message }}</small></p>
								@enderror
						</div>

						<button class="form__button" type="submit">Send</button>
				</form>
		</div>
</main>
@endsection
