@extends('layout')

@section('content')
<div class="container mt-4">
  <h2>Edit Aset Kantor</h2>
  <form action="{{ route('assets.update', $asset) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="nama_aset" class="form-label">Nama Aset</label>
      <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="{{ $asset->nama_aset }}" required>
    </div>
    <div class="mb-3">
      <label for="kategori" class="form-label">Kategori</label>
      <select class="form-control" id="kategori" name="kategori" required>
        <option value="">Pilih Kategori</option>
        <option value="Elektronik" {{ $asset->kategori == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
        <option value="Furnitur" {{ $asset->kategori == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
        <option value="Kendaraan" {{ $asset->kategori == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
        <option value="Lainnya" {{ $asset->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="lokasi" class="form-label">Lokasi</label>
      <select class="form-control" id="lokasi" name="lokasi" required>
        <option value="">Pilih Lokasi</option>
        <option value="Ruang Kerja" {{ $asset->lokasi == 'Ruang Kerja' ? 'selected' : '' }}>Ruang Kerja</option>
        <option value="Ruang Rapat" {{ $asset->lokasi == 'Ruang Rapat' ? 'selected' : '' }}>Ruang Rapat</option>
        <option value="Ruang Presentasi" {{ $asset->lokasi == 'Ruang Presentasi' ? 'selected' : '' }}>Ruang Presentasi</option>
        <option value="Ruang SDM" {{ $asset->lokasi == 'Ruang SDM' ? 'selected' : '' }}>Ruang SDM</option>
        <option value="Gudang" {{ $asset->lokasi == 'Gudang' ? 'selected' : '' }}>Gudang</option>
        <option value="Lainnya" {{ $asset->lokasi == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="kondisi" class="form-label">Kondisi</label>
      <select class="form-control" id="kondisi" name="kondisi" required>
        <option value="">Pilih Kondisi</option>
        <option value="Baik" {{ $asset->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
        <option value="Rusak" {{ $asset->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
        <option value="Perlu Perbaikan" {{ $asset->kondisi == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
        <option value="Baru" {{ $asset->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $asset->jumlah }}" required>
    </div>
    <div class="mb-3">
      <label for="foto" class="form-label">Foto Aset</label>
      @if($asset->foto)
        <div class="mb-2">
          <img src="{{ asset('storage/' . $asset->foto) }}" alt="Foto {{ $asset->nama_aset }}" width="100" height="100" class="img-thumbnail">
          <p class="form-text">Foto saat ini</p>
        </div>
      @endif
      <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
      <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah foto.</div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('assets.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
