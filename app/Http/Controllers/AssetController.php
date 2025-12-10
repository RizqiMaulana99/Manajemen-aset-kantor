<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Exports\AssetExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Asset::query();

        // Search by nama_aset
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama_aset', 'like', '%' . $request->search . '%');
        }

        // Filter by kategori
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        // Filter by lokasi
        if ($request->has('lokasi') && !empty($request->lokasi)) {
            $query->where('lokasi', $request->lokasi);
        }

        // Filter by kondisi
        if ($request->has('kondisi') && !empty($request->kondisi)) {
            $query->where('kondisi', $request->kondisi);
        }

        $assets = $query->get();
        return view('assets.index', compact('assets'));
    }

    /**
     * Export assets to Excel
     */
    public function export(Request $request)
    {
        $query = Asset::query();

        // Apply same filters as index
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama_aset', 'like', '%' . $request->search . '%');
        }

        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->has('lokasi') && !empty($request->lokasi)) {
            $query->where('lokasi', $request->lokasi);
        }

        if ($request->has('kondisi') && !empty($request->kondisi)) {
            $query->where('kondisi', $request->kondisi);
        }

        return Excel::download(new AssetExport($query), 'daftar_aset_' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('assets', 'public');
        }

        Asset::create($data);
        return redirect()->route('assets.index')->with('success', 'Aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'nama_aset' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($asset->foto && \Storage::disk('public')->exists($asset->foto)) {
                \Storage::disk('public')->delete($asset->foto);
            }
            $data['foto'] = $request->file('foto')->store('assets', 'public');
        }

        $asset->update($data);
        return redirect()->route('assets.index')->with('success', 'Aset berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Aset berhasil dihapus!');
    }
}
