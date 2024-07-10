<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\employee;
use App\Models\AssetUsage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssetUsageRequest;
use App\Http\Requests\UpdateAssetUsageRequest;

class AssetUsageController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        $employees = employee::all();
        return view('dashboard.asset_usages.index', compact('assets', 'employees'));
        // $assetUsages = AssetUsage::with(['asset', 'employee'])->get();
        // dump($assetUsages);
    }

    public function getAssetUsages()
    {
        $assetUsages = AssetUsage::with(['asset', 'employee'])->get();
        return response()->json($assetUsages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,asset_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'use_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:use_date',
            'purpose' => 'required|string',
        ]);

        $assetUsage = AssetUsage::create($request->all());

        return response()->json(['success' => 'Asset usage added successfully.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,asset_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'use_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:use_date',
            'purpose' => 'required|string',
        ]);

        $assetUsage = AssetUsage::findOrFail($id);
        $assetUsage->update($request->all());

        return response()->json($assetUsage);
    }

    public function destroy($id)
    {
        $assetUsage = AssetUsage::findOrFail($id);
        $assetUsage->delete();

        return response()->json(['success' => 'Asset usage deleted successfully.']);
    }
}
