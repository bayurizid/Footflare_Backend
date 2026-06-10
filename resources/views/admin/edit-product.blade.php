<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit Produk</h2>

    <form action="/admin/products/{{ $product->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name"
                   value="{{ $product->name }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price"
                   value="{{ $product->price }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Diskon (%)</label>
            <input type="number" name="discount_percentage"
                   value="{{ $product->discount_percentage }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                      class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Brand ID</label>
            <input type="number" name="brand_id"
                   value="{{ $product->brand_id }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Category ID</label>
            <input type="number" name="category_id"
                   value="{{ $product->category_id }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Thumbnail URL</label>
            <input type="text" name="thumbnail_url"
                   value="{{ $product->thumbnail_url }}"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="/admin/products" class="btn btn-secondary">
            Batal
        </a>

    </form>

</div>

</body>
</html>