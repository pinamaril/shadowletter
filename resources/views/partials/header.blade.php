<header>
		<a class="header__logo" href="/">shadowletter</a>

		@auth
				<form action="/logout" method="post">
						@csrf

						<button class="header__button">Logout</a>
				</form>
		@else
				<a class="header__button" href="/login">Login</a>
		@endauth
</header>
