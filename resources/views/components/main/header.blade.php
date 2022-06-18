<section class="navigation mb-2">
            <a href="{{ route('main') }}" class="app-link">Заезжай</a>
         <!--   <div class="navigation-links">
                <a href="#" class="nav-link ">Destinations</a>
                <a href="#" class="nav-link active">Hotels</a>
                <a href="#" class="nav-link">Camping</a>

            </div> -->
            <div class="nav-right-side">
                <button class="mode-switch">
                    <svg class="sun" fill="none" stroke="#fbb046" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-sun" viewBox="0 0 24 24"><defs/><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    <svg class="moon" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-moon" viewBox="0 0 24 24"><defs/><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
                </button>

                <div class="d-flex">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))

                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>

                        @endif

                        @if (Route::has('register'))

                                <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>

                        @endif
                    @else
                        <a href="{{ route('userPanel', Auth::user()->id) }}" class="profile-btn">
                            <span>{{ Auth::user()->name }}</span>
                            <img src="{{ asset("storage/".Auth::user()->image) }}" alt="pp">
                        </a>
                    <div>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>
                    </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    @endguest
                </div>




            </div>
</section>
