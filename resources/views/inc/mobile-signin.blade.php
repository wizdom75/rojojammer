
@guest
    <div class="mt-4 w-100 dropdown-menu dropdown-menu-right auth-box rounded-0 " aria-labelledby="navbarDropdown" id="mobileAccount">
        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
        @if (Route::has('register'))
            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    </div>
    
@else

        <div class="mt-4 w-100 dropdown-menu dropdown-menu-right auth-box rounded-0" aria-labelledby="navbarDropdown" id="mobileAccount">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

@endguest
