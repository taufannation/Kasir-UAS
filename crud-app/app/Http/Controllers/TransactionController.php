<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.transaksi', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.createtr', compact('products'));
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            // Sesuaikan dengan kebutuhan validasi lainnya
        ]);

        // Ambil data produk berdasarkan product_id
        $product = Product::findOrFail($request->input('product_id'));

        // Hitung total harga transaksi
        $totalPrice = $product->price * $request->input('quantity');

        // Buat transaksi baru
        Transaction::create([
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'total_price' => $totalPrice,
            // Sesuaikan dengan kolom lainnya
        ]);

        return redirect()->route('transactions.transaksi')->with('success', 'Transaction created successfully!');
    }
}