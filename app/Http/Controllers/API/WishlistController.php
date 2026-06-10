<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Tampilkan wishlist user
    public function index(Request $request)
    {
        $wishlist = Wishlist::where('user_id', $request->user()->id)
            ->with('product')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $wishlist
        ]);
    }

    // Tambah wishlist
    public function store(Request $request)
    {
        $existing = Wishlist::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if (!$existing) {
            Wishlist::create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produk ditambahkan ke wishlist'
        ]);
    }

    // Hapus wishlist
    public function destroy(Request $request, $productId)
    {
        Wishlist::where('user_id', $request->user()->id)
            ->where('product_id', $productId)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Wishlist dihapus'
        ]);
    }
}