<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('inventory.index');
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'harga' => 'required',
        ]);

        $inventory = Inventory::create([
            'fieldinventory_id' => '0000' . Inventory::count(),
            'name' => $request->name,
            'stok' => $request->stock,
            'harga' => $request->harga,
        ]);

        return redirect()->route('inventory');
    }
}
