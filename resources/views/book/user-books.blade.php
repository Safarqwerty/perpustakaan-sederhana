<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="flex" style="background-color: #25324d;">
        <!-- Sidebar -->
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

        <!-- Main Content -->
        <div class="flex-grow" style="padding: 1.5rem; background-color: #25324d;">
            <div
                style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                @include('alert.alert-info')

                <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                    <div
                        class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0 sm:space-x-4">
                        <form action="{{ route('buku.userBooks') }}" method="GET"
                            style="display: flex; gap: 1rem; width: 100%; max-width: 600px;">
                            <!-- Dropdown untuk filter kategori -->
                            <select name="kategori"
                                style="border: 1px solid #CBD5E0; padding: 0.5rem; border-radius: 0.375rem; width: 50%;">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoriOptions as $kategori)
                                    <option value="{{ $kategori }}"
                                        {{ request('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Input untuk mencari judul buku -->
                            <input type="text" name="search" placeholder="Cari judul buku..."
                                value="{{ request('search') }}"
                                style="border: 1px solid #CBD5E0; padding: 0.5rem; border-radius: 0.375rem; width: 50%;">
                            <!-- Tombol untuk submit form -->
                            <button type="submit"
                                style="padding: 0.5rem 1rem; background-color: #3B82F6; color: white; border-radius: 0.375rem;">Cari</button>
                        </form>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 1.5rem; margin-top: 1.5rem;">
                        @forelse ($buku as $item)
                            <div
                                style="background-color: #2D3748; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); overflow: hidden;">
                                <img src="{{ asset('storage/' . $item->cover_path) }}"
                                    alt="{{ $item->nama_buku }} cover"
                                    style="width: 100%; height: 12rem; object-fit: cover;">
                                <div style="padding: 1rem;">
                                    <h3 style="font-size: 1.125rem; font-weight: 600; color: #E2E8F0;">
                                        {{ $item->nama_buku }}</h3>
                                    <p style="color: #CBD5E0;">Penulis: {{ $item->penulis }}</p>
                                    <p style="color: #CBD5E0;">Tahun Rilis: {{ $item->tahun_rilis }}</p>
                                    <div
                                        style="margin-top: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                        @if (auth()->user()->role === 'siswa')
                                            <!-- Tombol untuk membuka modal Bootstrap -->
                                            <button type="button" class="btn btn-link" style="color: #63B3ED;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal-{{ $item->id }}">Detail</button>
                                        @else
                                            <a href="{{ route('buku.show', $item->id) }}"
                                                style="color: #63B3ED; text-decoration: none">Detail</a>
                                            <x-confirm-delete-modal>
                                                <x-slot name="trigger">
                                                    <button class="btn btn-link"
                                                        style="color: #F56565; text-decoration: none">Hapus</button>
                                                </x-slot>
                                                <x-slot name="title">
                                                    Konfirmasi Hapus
                                                </x-slot>
                                                <x-slot name="content">
                                                    Apakah Anda yakin ingin menghapus buku ini?
                                                </x-slot>
                                                <x-slot name="footer">
                                                    <form id="deleteForm-{{ $item->id }}"
                                                        action="{{ route('buku.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-primary-button type="submit"
                                                            style="background-color: #F56565; color: white;">Hapus</x-primary-button>
                                                        <x-secondary-button
                                                            data-bs-dismiss="modal">Batal</x-secondary-button>
                                                    </form>
                                                </x-slot>
                                            </x-confirm-delete-modal>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Detail Buku Bootstrap -->
                            <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}">
                                                {{ $item->nama_buku }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Kode Buku:</strong> {{ $item->kode_buku }}</p>
                                            <p><strong>Nama Buku:</strong> {{ $item->nama_buku }}</p>
                                            <p><strong>Penulis:</strong> {{ $item->penulis }}</p>
                                            <p><strong>Tahun Rilis:</strong> {{ $item->tahun_rilis }}</p>
                                            <p><strong>Kategori:</strong> {{ $item->kategori }}</p>
                                            <p><strong>Stok:</strong> {{ $item->stok }}</p>

                                            @if ($item->ebook_path)
                                                <a href="{{ asset('storage/' . $item->ebook_path) }}"
                                                    class="btn btn-primary" target="_blank">Baca eBook</a>
                                            @else
                                                <p class="text-danger">eBook tidak tersedia.</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div style="grid-column: span 5; text-align: center; color: #A0AEC0;">
                                Tidak ada data yang ditemukan.
                            </div>
                        @endforelse
                    </div>

                    <div style="margin-top: 1.5rem; color: whitesmoke">
                        {{ $buku->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
