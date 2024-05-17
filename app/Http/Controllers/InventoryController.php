<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $data = Inventory::all()->sortBy('fieldinventory_id');
        return view('inventory.index', compact('data'));
    }

    public function create()
    {
        $metaData = [
            'title' => 'Add Inventory',
            'buttom' => 'Simpan',
            "action" => 'post',
            'url' => route('inventory.store')
        ];

        return view('inventory.form', compact('metaData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'harga' => ['required', 'numeric'],
        ]);

        $inventory = Inventory::create([
            'fieldinventory_id' => '0000' . Inventory::count(),
            'name' => $request->name,
            'stok' => $request->stock ?? 5,
            'harga' => $request->harga,
        ]);

        return redirect()->route('inventory');
    }

    public function edit(Inventory $inventory)
    {
        $metaData = [
            'title' => 'Edit Inventory',
            'buttom' => 'Update',
            "action" => 'put',
            'url' => route('inventory.update', ['inventory' => $inventory->id])
        ];
        return view('inventory.form', compact('inventory', 'metaData'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required',
            'stock' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
        ], [
            'stock.numeric' => 'Stok harus di isi dengan angka'
        ]);
        Inventory::where('id', $inventory->id)->update([
            'name' => $request->name,
            'stok' => $request->stock,
            'harga' => $request->harga,
        ]);

        return redirect()->route('inventory');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory');
    }
}
