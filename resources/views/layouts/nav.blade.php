<nav class="navbar navbar-expand-md navbar-light fixed-top navbar-laravel">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x" width="124" height="38" alt="inTech Logo" />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				@auth
				<li class="nav-item{{ request()->is('/') ? ' active' : '' }}">
					<a class="nav-link" href="/"><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</a>
				</li>
				<li class="nav-item{{ request()->is('training-videos/*') ? ' active' : '' }}">
					<a class="nav-link" href="/training-videos/flyer-chase"><i class="fas fa-film"></i> {{ __('Training Videos') }}</a>
				</li>
				<li class="nav-item{{ request()->is('service/*') ? ' active' : '' }}">
					<a class="nav-link" href="/service/warranty"><i class="fas fa-car-mechanic"></i> {{ __('Service') }}</a>
				</li>
				<li class="nav-item{{ request()->is('marketing-materials/*') ? ' active' : '' }}">
					<a class="nav-link" href="/marketing-materials/logos"><i class="fas fa-poll"></i> {{ __('Marketing Materials') }}</a>
				</li>
				<li class="nav-item{{ request()->is('sales-tools/*') ? ' active' : '' }}">
					<a class="nav-link" href="/sales-tools/flyer-chase"><i class="fas fa-shopping-bag"></i> {{ __('Sales Tools') }}</a>
				</li>
				@endauth
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
					{{-- <li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li> --}}
					{{-- <li class="nav-item">
						@if (Route::has('register'))
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						@endif
					</li> --}}
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							@if (Auth::user()->email === 'mstoffer@intechtrailers.com' || Auth::user()->email === 'amaxwell@intechtrailers.com' || Auth::user()->email === 'keith@intechrv.com' || Auth::user()->email === 'service@intechrv.com')
								<h6 class="dropdown-header">Nova Dashboard</h6>
								<a class="dropdown-item" href="/nova"><i class="fas fa-tachometer-alt"></i> {{ __('Nova') }}</a>
								<div class="dropdown-divider"></div>
							@endif
							@if (Auth::user()->email === 'mstoffer@intechtrailers.com')
								<a class="dropdown-item" href="/dealers/updateall"><i class="fas fa-users"></i> {{ __('Update Dealers') }}</a>
								<div class="dropdown-divider"></div>
							@endif
							<a class="dropdown-item" href="/profile"><i class="fas fa-user"></i> {{ __('Profile') }}</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
