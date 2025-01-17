<title>Detail Peminjaman</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pinjaman Buku') }} - {{ $borrowing->borrow_number }}
        </h2>
    </x-slot>

    <div style="padding: 3.5rem 20.5rem; background-color: #25324d;">
        <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            <div style="background-color: #2D3748; border-radius: 0.375rem; overflow: hidden; padding: 1.5rem; border-bottom: 1px solid #E2E8F0;">
                <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-700">
                    <tbody class="bg-gray-800 divide-y divide-gray-700 dark:bg-gray-800 dark:divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Nomor Peminjaman</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->no_peminjaman }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Peminjam</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->user->nama }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Judul Buku</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->buku->nama_buku }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Pengarang</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->buku->penulis }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Tahun Terbit</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->buku->tahun_rilis }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Tanggal Pinjam</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->tgl_peminjaman }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Tanggal Kembali</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->tgl_pengembalian }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Status</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->status }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Keterangan</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400 dark:text-gray-400 uppercase">Denda</td>
                            <td class="px-6 py-4 text-lg text-gray-200 dark:text-gray-200">{{ $borrowing->total_denda }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br/>
            <x-secondary-button href="{{ route('peminjaman-buku.index') }}">
                Kembali
            </x-secondary-button>
        </div>
    </div>
</x-app-layout>
