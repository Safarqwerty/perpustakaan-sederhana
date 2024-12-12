<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    @php
        $role = auth()->user()->role;
    @endphp
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 text-white flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-200" />
                        <div class="ml-2">
                            <div style="text-decoration: none" class="font-bold text-sm text-gray-200">
                                {{ App\Models\Setting::first()->webname }}</div>
                            <div style="text-decoration: none" class="text-sm text-gray-400">
                                {{ App\Models\Setting::first()->description }}</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 bg-gray-800 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>({{ Auth::user()->kelas }} {{ Auth::user()->identitas }}) - {{ Auth::user()->nama }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-200 hover:text-gray-300">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        @if ($role === 'admin')
                            <x-dropdown-link :href="route('settings.index')" class="text-gray-200 hover:text-gray-300">
                                {{ __('Pengaturan') }}
                            </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="text-gray-200 hover:text-gray-300"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-200 hover:text-gray-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-200">({{ Auth::user()->identity }})
                    {{ Auth::user()->nama }} - {{ Auth::user()->kelas }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('peminjaman-buku.index')" class="text-gray-200 hover:text-gray-300">
                    {{ __('Pinjam Buku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pengembalian-buku.index')" class="text-gray-200 hover:text-gray-300">
                    {{ __('Pengembalian Buku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-200 hover:text-gray-300">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @if ($role === 'admin')
                    <x-responsive-nav-link :href="route('settings.index')" class="text-gray-200 hover:text-gray-300">
                        {{ __('Settings') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('laporan.index')" class="text-gray-200 hover:text-gray-300">
                        {{ __('Laporan') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-gray-200 hover:text-gray-300"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>