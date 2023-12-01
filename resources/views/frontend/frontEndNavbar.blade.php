@if (Route::has('login'))
    @include('frontend.frontEndModal')
    
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="640:w-[100%] md:max-w-[100%] lg:max-w-[100%] 3xl:max-w-[72%] mx-auto flex flex-wrap items-center justify-between p-6">
    <a href="{{ url('/') }}" class="flex items-center">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sekai Music</span>
    </a>
    <div class="flex items-center md:order-2">
        <div class="mr-2">
            <form action="{{ url('search') }}" method="GET" role="search">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative top-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" name="searchInput" value="{{ Request::get('searchInput') }}" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                    <button type="submit" class="hidden text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
        <x-dropdown>
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div class="text-sm"><i class="fa-solid fa-gear"></i> </div>
                    </button>    
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="url('track-order')">
                        Track Order
                    </x-dropdown-link>  
                </x-slot>
        </x-dropdown>
        <div>
            @auth
            <div class=" sm:flex sm:items-center sm:justify-center">
                <a href="{{ url('cart') }}" class="text-gray-500 flex items-center"><i class="fa-solid fa-cart-shopping "></i> (<livewire:front-end.cart.count-cart/>)</a>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-sm">{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="mt-2">
                        <i class="fa-solid fa-user"></i>  {{ __('Profile') }}
                        </x-dropdown-link>
                        @if(auth()->user()->role_as == '1')
                        <x-dropdown-link :href=" url('admin/dashboard')">
                        <i class="fa-solid fa-gauge"></i> Dashboard
                        </x-dropdown-link>
                        @endif
                        <x-dropdown-link :href=" url('my-orders')">
                        <i class="fa-solid fa-bag-shopping"></i> My Orders
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                               <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <x-dropdown>
                <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div class="text-sm"><i class="fa-solid fa-user"></i> </div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>    
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href=" route('login')">
                        Login
                    </x-dropdown-link>
                
                    @if(Route::has('register'))
                    <x-dropdown-link :href="route('register')">
                        Create an Account
                    </x-dropdown-link>
                    @endif
                 
                </x-slot>
            </x-dropdown>
                
            @endauth
        </div>
        <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-language" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-language">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="{{ url('/')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</a>
            </li>
            <li>
                <a href="{{ url('new-products') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">New Products</a>
            </li>
            <li>
                <a data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent cursor-pointer" type="button">
                    Instruments <i class="fa-solid fa-chevron-down ml-2 text-sm text-gray-900"></i>
                </a>
            </li>
            <li>
            <a data-modal-target="defaultModal" data-modal-toggle="gears" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent cursor-pointer" type="button">
                    Gears <i class="fa-solid fa-chevron-down ml-2 text-sm text-gray-900"></i>
                </a>
            </li>
            <li>
            <a data-modal-target="defaultModal" data-modal-toggle="brands" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent cursor-pointer" type="button">
                    Brands <i class="fa-solid fa-chevron-down ml-2 text-sm text-gray-900"></i>
                </a> 
            </li>
        </ul>
    </div>
    </div>
    </nav>
@endif

