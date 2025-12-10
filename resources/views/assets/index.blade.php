@extends('layout')

@section('content')
<div class="container mt-4">
  <h2>Daftar Aset Kantor</h2>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('assets.create') }}" class="btn btn-primary">Tambah Aset</a>
    <div>
      <button onclick="window.print()" class="btn btn-info me-2">Cetak</button>
      <a href="{{ route('assets.export', request()->query()) }}" class="btn btn-success">Export Excel</a>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <!-- Search and Filter Form -->
  <div class="card mb-4">
    <div class="card-body">
      <form method="GET" action="{{ route('assets.index') }}" class="row g-3">
        <div class="col-md-3">
          <label for="search" class="form-label">Cari Nama Aset</label>
          <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Cari nama aset...">
        </div>
        <div class="col-md-3">
          <label for="kategori" class="form-label">Filter Kategori</label>
          <select class="form-control" id="kategori" name="kategori">
            <option value="">Semua Kategori</option>
            <option value="Elektronik" {{ request('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
            <option value="Furniture" {{ request('kategori') == 'Furniture' ? 'selected' : '' }}>Furniture</option>
            <option value="Kendaraan" {{ request('kategori') == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="lokasi" class="form-label">Filter Lokasi</label>
          <select class="form-control" id="lokasi" name="lokasi">
            <option value="">Semua Lokasi</option>
            <option value="Ruang Kerja" {{ request('lokasi') == 'Ruang Kerja' ? 'selected' : '' }}>Ruang Kerja</option>
            <option value="Ruang Meeting" {{ request('lokasi') == 'Ruang Meeting' ? 'selected' : '' }}>Ruang Meeting</option>
            <option value="Gudang" {{ request('lokasi') == 'Gudang' ? 'selected' : '' }}>Gudang</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="kondisi" class="form-label">Filter Kondisi</label>
          <select class="form-control" id="kondisi" name="kondisi">
            <option value="">Semua Kondisi</option>
            <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak" {{ request('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
            <option value="Perlu Perbaikan" {{ request('kondisi') == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
          </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-secondary">Cari & Filter</button>
          <a href="{{ route('assets.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
      </form>
    </div>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Kondisi</th>
        <th>Jumlah</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($assets as $index => $asset)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>
            @if($asset->foto)
              <img src="{{ asset('storage/' . $asset->foto) }}" alt="Foto {{ $asset->nama_aset }}" width="50" height="50" class="img-thumbnail">
            @else
              <span class="text-muted">Tidak ada foto</span>
            @endif
          </td>
          <td>{{ $asset->nama_aset }}</td>
          <td>{{ $asset->kategori }}</td>
          <td>{{ $asset->lokasi }}</td>
          <td>{{ $asset->kondisi }}</td>
          <td>{{ $asset->jumlah }}</td>
          <td>
            <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" class="d-inline" id="delete-form-{{ $asset->id }}">
              @csrf
              @method('DELETE')
            </form>
            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $asset->id }}, '{{ $asset->nama_aset }}')">Hapus</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
function confirmDelete(assetId, assetName) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: `Anda akan menghapus aset "${assetName}". Tindakan ini tidak dapat dibatalkan!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + assetId).submit();
        }
    });
}
</script>

<style media="print">
  .btn, .d-flex, .card {
    display: none !important;
  }
  .container {
    margin: 0 !important;
  }
  h2 {
    margin-bottom: 20px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
  }
  img {
    max-width: 50px;
    max-height: 50px;
  }
</style>
@endsection
