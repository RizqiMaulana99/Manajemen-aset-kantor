@extends('layout')

@section('content')
<div class="container mt-4">
  <h2>Tambah Aset Kantor</h2>
  <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nama_aset" class="form-label">Nama Aset</label>
      <input type="text" class="form-control" id="nama_aset" name="nama_aset" required>
    </div>
    <div class="mb-3">
      <label for="kategori" class="form-label">Kategori</label>
      <select class="form-control" id="kategori" name="kategori" required>
        <option value="">Pilih Kategori</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Furnitur">Furnitur</option>
        <option value="Kendaraan">Kendaraan</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="lokasi" class="form-label">Lokasi</label>
      <select class="form-control" id="lokasi" name="lokasi" required>
        <option value="">Pilih Lokasi</option>
        <option value="Ruang Kerja">Ruang Kerja</option>
        <option value="Ruang Rapat">Ruang Rapat</option>
        <option value="Ruang Presentasi">Ruang Presentasi</option>
        <option value="Ruang SDM">Ruang SDM</option>
        <option value="Gudang">Gudang</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="kondisi" class="form-label">Kondisi</label>
      <select class="form-control" id="kondisi" name="kondisi" required>
        <option value="">Pilih Kondisi</option>
        <option value="Baik">Baik</option>
        <option value="Rusak">Rusak</option>
        <option value="Perlu Perbaikan">Perlu Perbaikan</option>
        <option value="Baru">Baru</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="number" class="form-control" id="jumlah" name="jumlah" required>
    </div>
    <div class="mb-3">
      <label for="foto" class="form-label">Foto Aset</label>
      <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
      <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB.</div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('assets.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
