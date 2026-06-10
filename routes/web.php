<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {

    $totalProduk = Product::count();
    $totalUser = User::count();
    $totalPesanan = Order::count();

    $totalProcessing = Order::where('status', 'Processing')->count();
    $totalCompleted = Order::where('status', 'Completed')->count();

    $recentOrders = Order::latest()->take(5)->get();

    return view('admin.dashboard', compact(
        'totalProduk',
        'totalUser',
        'totalPesanan',
        'totalProcessing',
        'totalCompleted',
        'recentOrders'
    ));
});

/*
|--------------------------------------------------------------------------
| CRUD Produk
|--------------------------------------------------------------------------
*/

// Daftar Produk
Route::get('/admin/products', function () {

    $products = Product::all();

    return view('admin.products', compact('products'));
});

// Form Tambah Produk
Route::get('/admin/products/create', function () {

    return view('admin.create-product');
});

// Simpan Produk
Route::post('/admin/products', function (Request $request) {

    Product::create([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'discount_percentage' => $request->discount_percentage,
        'thumbnail_url' => $request->thumbnail_url,
    ]);

    return redirect('/admin/products');
});

// Form Edit Produk
Route::get('/admin/products/{id}/edit', function ($id) {

    $product = Product::findOrFail($id);

    return view('admin.edit-product', compact('product'));
});

// Update Produk
Route::put('/admin/products/{id}', function (Request $request, $id) {

    $product = Product::findOrFail($id);

    $product->update([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'discount_percentage' => $request->discount_percentage,
        'thumbnail_url' => $request->thumbnail_url,
    ]);

    return redirect('/admin/products');
});

// Hapus Produk
Route::delete('/admin/products/{id}', function ($id) {

    Product::findOrFail($id)->delete();

    return redirect('/admin/products');
});

/*
|--------------------------------------------------------------------------
| Kelola Pesanan
|--------------------------------------------------------------------------
*/

// Daftar Pesanan
Route::get('/admin/orders', function () {

    $orders = Order::all();

    return view('admin.orders', compact('orders'));
});

// Update Status Pesanan
Route::put('/admin/orders/{id}', function (Request $request, $id) {

    $order = Order::findOrFail($id);

    $currentStatus = $order->status;
    $newStatus = $request->status;

        $allowedTransitions = [
        'Placed' => ['Processing', 'Cancelled'],
        'Processing' => ['Completed', 'Cancelled'],
        'Completed' => [],
        'Cancelled' => [],
    ];

    if (
        isset($allowedTransitions[$currentStatus]) &&
        in_array($newStatus, $allowedTransitions[$currentStatus])
    ) {

        $order->status = $newStatus;
        $order->save();
    }

    return redirect('/admin/orders');
});

/*
|--------------------------------------------------------------------------
| Kelola User
|--------------------------------------------------------------------------
*/

Route::get('/admin/users', function () {

    $users = User::all();

    return view('admin.users', compact('users'));
});