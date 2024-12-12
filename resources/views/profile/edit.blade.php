<title>{{ config('app.titleEditProfile', 'Laravel') }} - {{ $settings->webname }} </title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="flex" style="background-color: #25324d;">
        <div style="width: 250px; background-color: #2D3748; padding: 1.5rem; min-height: 100vh;">
            <div class="mb-6 text-center">
                <img src="https://www.svgrepo.com/show/513520/book-closed.svg" class="mx-auto h-24 w-24" alt="Pinjam Buku">
                <h3 style="font-size: 1.125rem; font-weight: 600; color: #E2E8F0;">Perpustakaan Sekolah</h3>
                <p style="color: #CBD5E0; margin-top: 0.5rem;">{{ $settings->webname }}</p>
            </div>

            <nav>
                <ul style="padding-left: 0">
                    <li class="mb-2">
                        <a href="{{ route('buku.userBooks') }}"
                            style="display: block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.5rem; color: whitesmoke; text-decoration: none; transition: background-color 0.3s;">
                            Semua Buku
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('peminjaman-buku.index') }}"
                            style="display: block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.5rem; color: whitesmoke; text-decoration: none; transition: background-color 0.3s;">
                            Peminjaman Buku
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('pengembalian-buku.index') }}"
                            style="display: block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.5rem; color: whitesmoke; text-decoration: none; transition: background-color 0.3s;">
                            Pengembalian Buku
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profile.edit') }}"
                            style="display: block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.5rem; color: whitesmoke; text-decoration: none; transition: background-color 0.3s;">
                            Ubah Profile
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div style="padding: 1.5rem; background-color: #25324d; width: 100%">
            <div class="mx-auto space-y-6">
                @include('alert.alert-info')
                <div class="p-4 sm:p-8"
                    style="background-color: #1A202C; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8"
                    style="background-color: #1A202C; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
