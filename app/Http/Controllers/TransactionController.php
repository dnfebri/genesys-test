<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::orderBy('id', 'desc')->get();
        return view('transaction.index', compact('data'));
    }

    public function create()
    {
        $metaData = [
            'title' => 'Pembelian',
            'buttom' => 'Submit',
            "action" => 'put',
            'url' => ''
        ];
        $data = Inventory::orderBy('id', 'desc')->get();
        return view('transaction.add', compact('metaData', 'data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'item' => ['required', 'numeric'],
        ], [
            'item.numeric' => 'Stok harus di isi dengan angka'
        ]);

        $inventory = Inventory::find($request->name);

        $inventory->stok = $inventory->stok - $request->item;
        if ($inventory->stok < 0) {
            return redirect()->route('pembelian.create')->with('error', 'Stok Tidak Cukup');
        }

        $data = Transaction::create([
            'transaction_id' => '0000' . Transaction::count() + 1,
            'name_product' => $inventory->name,
            'quantity' => $request->item,
            'price' => $inventory->harga,
            'amount' => $request->item * $inventory->harga
        ]);
        $inventory->update();

        return redirect()->route('pembelian.show', ['data' => $data, 'transaction' => $data['id']]);
    }

    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }
}
