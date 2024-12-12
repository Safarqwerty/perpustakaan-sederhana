<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" style="color: #E2E8F0;">
    @csrf

    <div class="mb-4">
        <label for="kode_buku" style="color: #CBD5E0; font-weight: 600;">{{ __('Kode Buku') }}</label>
        <input id="kode_buku" type="text" name="kode_buku" value="{{ old('kode_buku') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('kode_buku')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="nama_buku" style="color: #CBD5E0; font-weight: 600;">{{ __('Nama Buku') }}</label>
        <input id="nama_buku" type="text" name="nama_buku" value="{{ old('nama_buku') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('nama_buku')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="penulis" style="color: #CBD5E0; font-weight: 600;">{{ __('Nama Pengarang') }}</label>
        <input id="penulis" type="text" name="penulis" value="{{ old('penulis') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('penulis')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="kategori" style="color: #CBD5E0; font-weight: 600;">{{ __('Kategori Buku') }}</label>
        <input id="kategori" type="text" name="kategori" value="{{ old('kategori') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('kategori')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="tahun_rilis" style="color: #CBD5E0; font-weight: 600;">{{ __('Tahun Rilis') }}</label>
        <input id="tahun_rilis" type="text" name="tahun_rilis" value="{{ old('tahun_rilis') }}"
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('tahun_rilis')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="stok" style="color: #CBD5E0; font-weight: 600;">{{ __('Stok') }}</label>
        <input id="stok" type="number" name="stok" value="{{ old('stok') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('stok')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="ebook" style="color: #CBD5E0; font-weight: 600;">{{ __('E-book') }}</label>
        <input id="ebook" type="file" name="ebook"
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('ebook')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="cover" style="color: #CBD5E0; font-weight: 600;">{{ __('Cover') }}</label>
        <input id="cover" type="file" name="cover"
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('cover')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <br />

    <div class="flex items-center space-x-4">
        <button type="submit"
            style="background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none;">
            {{ __('Simpan') }}
        </button>

        <a href="{{ route('buku.index') }}"
            style="background-color: #2D3748; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none;">
            Kembali
        </a>
    </div>
</form>
