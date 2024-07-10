<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\AssetUsage;
use App\Models\TaskAsset;
use App\Http\Requests\StoreassetRequest;
use App\Http\Requests\UpdateassetRequest;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $assets = asset::all();
        return view('dashboard.asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreassetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(asset $asset)
    {
        //
        return view('dashboard.asset.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(asset $asset)
    {
        //
        return view('dashboard.asset.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateassetRequest $request, asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asset $asset)
    {
        //
        $cek = AssetUsage::where('asset_id', '=', $asset->asset_id)->count();
        $cek2 = TaskAsset::where('asset_id', '=', $asset->asset_id)->count();
        if($cek == 0 && $cek2 == 0){
            $asset->delete();
            return redirect()->route('asset.index')->with('success', 'Assets deleted successfully.');
        }else{
            return redirect()->route('asset.index')->with('danger', 'Gagal Menghapus barang masih di gunakan.');
        }
        
    }
    
}
