<nav class="bg-white shadow">
    <div class="container max-w-full px-6 py-3 md:flex md:justify-between md:items-center bg-gray-50 dark:bg-gray-800">
        <div class="flex justify-between items-center">
            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5a1 1 0 011-1h14a1 1 0 110 2H5a1 1 0 01-1-1zm1 6a1 1 0 100 2h14a1 1 0 100-2H5zm1 6a1 1 0 011-1h14a1 1 0 110 2H6a1 1 0 01-1-1z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div class="md:flex items-center">
            <div class="flex flex-col md:flex-row md:mx-6">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <a class="my-1 text-sm text-gray-200 font-medium hover:text-indigo-500 md:mx-4 md:my-0" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                <a class="my-1 text-sm text-gray-200 font-medium hover:text-indigo-500 md:mx-4 md:my-0" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                <div class="relative my-2 md:my-0 flex items-center">
                        <span class="relative z-10 block text-gray-200 mr-4">
                            Hi! {{ Auth::user()->name }}
                        </span>
                    <div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block w-full rounded text-left px-4 py-2 text-sm text-gray-200 hover:bg-indigo-500 hover:text-white">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
