@extends('layouts.app')

@section('container')
<main class="home">
		@if (session()->has('success'))
				<div class="flash-message success">
						<p>{{ session('success') }}</p>
				</div>
		@endif

		<a href="/change-password">Change password</a>

		@if (count($messages))
				@foreach ($messages as $message)
				<div class="message-card">
						<p class="message-card__text">{{ $message->text }}</p>
						
						<form action="/dashboard/{{ $message->id }}" method="post">
								@method('delete')
								@csrf

								<button class="message-card__button" onclick="return confirm('Are you sure to delete this message?')">[x] Delete</button>
						</form>
				</div>
				@endforeach
		@else
				<h2 class="message__display">You don't have any messages...</h2>
		@endif

		{{ $messages->links('vendor.pagination.default') }}
</main>
@endsection
