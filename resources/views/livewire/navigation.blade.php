<header class="bg-trueGray-700 sticky top-0 z-50" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        <a 
            :class="{'bg-opacity-100 text-blue-400': open, 'inline-flex': !open }"
            x-on:click="show()"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :classs="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">Categorías</span>
        </a>

        <a href="/" class="px-4">
            <x-logo-aqua class="block h-9 w-auto" />
            {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
        </a>

        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        <div class="mx-6 relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown> 

            @else
                <x-jet-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <i class="fa fa-user-circle text-white cursor-pointer text-5xl"></i>
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>

                </x-jet-dropdown>
            @endauth
        </div>
        
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
 
    </div>

    <nav id="navigation-menu"
        x-show="open"
        :class="{'block': open, 'hidden': !open}"
        class="bg-trueGray-700 bg-opacity-25 absolute w-full hidden">

        {{-- menu computer --}}
        <div class="container h-full hidden md:block">
            <div 
                x-on:click.away="close()"
                class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                            <a href="{{route('categories.show', $category)}}" class="py-2 px-4 text-sm flex items-center">

                                <span class="flex justify-center w-9">
                                    {!!$category->icon!!}
                                </span>
                                {{$category->name}}
                            </a>
                            
                            <div class="navigation-submenu bg-gray-100 absolute h-full w-3/4 top-0 right-0" hidden>
                                <div class="grid-cols-4">
                                    <p class="text-red-500">{{$category->name}}</p>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-gray-100">

                </div>
            </div>
        </div>

        {{-- menu mobile --}}
        <div class="bg-white h-full overflow-y-auto">
            <ul>
                @foreach ($categories as $category)
                <li class="text-trueGray-500 hover:bg-orange-500 hover:text-white">
                    <a href="{{route('categories.show', $category)}}" class="py-2 px-4 text-sm flex items-center">

                        <span class="flex justify-center w-9">
                            {!!$category->icon!!}
                        </span>
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
            </ul>

            <p class="text-trueGray-500 px-6 my-2">USUARIOS</p>

            @livewire('cart-mobil')

            @auth
                <a href="{{ route('profile.show')}}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">

                    <span class="flex justify-center w-9">
                        <i class="far fa-address-card"></i>
                    </span>
                    Perfiles
                </a>
                <a href=""
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit() " 
                    class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
            
            @else
            <a href="{{ route('login')}}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">

                <span class="flex justify-center w-9">
                    <i class="fas fa-user-circle"></i>
                </span>
                Iniciar sesión
            </a>

            <a href="{{ route('register')}}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">

                <span class="flex justify-center w-9">
                    <i class="fas fa-fingerprint"></i>
                </span>
                Resgistrate
            </a>
            @endauth
        </div>
    </nav>
</header>