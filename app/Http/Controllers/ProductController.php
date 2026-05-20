<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [];
        for ($i = 1; $i <= 20; $i++) {
            $products[] = [
                'id' => $i,
                'name' => 'Produk dirandom ke-' . $i,
                'price' => rand(10000, 100000) // Dibuat random dengan rand()
            ];
        }
        
        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.form');
    }

    public function store(Request $request)
    {
        // Tes saat form disubmit (Poin 14)
        return "Berhasil submit form ke route products.store! Nama produk yang diinput: " . $request->name;
    }

    public function edit($id)
    {
        return "Halaman Edit untuk produk ID: " . $id;
    }

    public function update(Request $request, $id)
    {
        return "Berhasil update produk ID: " . $id;
    }

    public function show($id)
    {
        return "Halaman Detail untuk produk ID: " . $id;
    }
}