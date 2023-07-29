<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="shrink-0 flex items-center ">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                </a>
            </div>

            {{--search bar--}}
            @if(request()->routeIs('estate.index'))
                <div
                    class="shrink-0 flex items-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 ">
                    <div id="search-bar"
                         class="pl-2 rounded-full  border   shadow-md hover:shadow-lg transition duration-200 ease-in-out flex justify-between items-center gap-8 md:gap-28">
                        <h1 class="px-4 font-bold text-sm">Start your search</h1>
                        <div
                            class="rounded-full bg-[#ff385c] w-8 h-8 flex justify-center items-center my-[7px] mr-[7px]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                 role="presentation" focusable="false"
                                 class=" w-3 h-3 stroke-white stroke-[5.33333]">
                                <path fill="none" d="M13 24a11 11 0 1 0 0-22 11 11 0 0 0 0 22zm8-3 9 9" class=""></path>
                            </svg>
                        </div>

                    </div>

                </div>
            @endif
            {{--            setting + language + add your house--}}
            <div class="shrink-0 flex items-center justify-between gap-5">
                @if(request()->routeIs('estate.index'))
                    <x-secondary-button
                        class="border-0 !shadow-none focus:ring-0 hover:bg-[#F7F7F7] focus:border-0 !rounded-full hidden md:block !py-2 !px-4 !text-base  !normal-case">
                        Add
                        your house
                    </x-secondary-button>
                @endif

                <div class="hover:bg-gray-100 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="20"
                         height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M3.6 9h16.8"></path>
                        <path d="M3.6 15h16.8"></path>
                        <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                        <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                    </svg>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <div class="bg-red-600">

                            </div>
                            <button
                                class="inline-flex items-center px-3 py-2 border  text-sm leading-4 font-medium rounded-full text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150   gap-2 border-gray-300 ">
                                <div>

                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h16"/>
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                              stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>

                                <div class="ml-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"
                                         role="presentation" focusable="false"
                                         class="w-6 h-6 fill-gray-600">
                                        <path
                                            d="M16 .7C7.56.7.7 7.56.7 16S7.56 31.3 16 31.3 31.3 24.44 31.3 16 24.44.7 16 .7zm0 28c-4.02 0-7.6-1.88-9.93-4.81a12.43 12.43 0 0 1 6.45-4.4A6.5 6.5 0 0 1 9.5 14a6.5 6.5 0 0 1 13 0 6.51 6.51 0 0 1-3.02 5.5 12.42 12.42 0 0 1 6.45 4.4A12.67 12.67 0 0 1 16 28.7z"
                                            class=""></path>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::check())

                                <x-dropdown-link :href="route('favorites.index')">
                                    {{ __('Favorites') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            @else
                                <x-dropdown-link class="font-bold" :href="route('login')">
                                    {{ __('Sign in') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('register')">
                                    {{ __('Sign up') }}
                                </x-dropdown-link>
                            @endif
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                  stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link class="font-bold" :href="route('login')">
                    {{ __('Sign in') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Sign up') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">


                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link>
                        {{ __('Add Your House') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link>
                        {{ __('Help') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>
    </div>


</nav>
