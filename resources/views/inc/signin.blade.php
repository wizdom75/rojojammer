                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pr-1">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user text-white"></i> My Account
                                    </a>
                                    <div class="mt-4 dropdown-menu dropdown-menu-right auth-box rounded-0" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                             @if (Route::has('register'))
                                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                             @endif
                                    </div>
                                </li>
                                
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}'s account
                                    </a>
    
                                    <div class="mt-4 dropdown-menu dropdown-menu-right auth-box rounded-0" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>