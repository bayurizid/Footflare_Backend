<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Tambah Produk</h2>

    <form action="/admin/products" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Diskon (%)</label>
            <input type="number" name="discount_percentage" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Brand ID</label>
            <input type="number" name="brand_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category ID</label>
            <input type="number" name="category_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Thumbnail URL</label>
            <input type="text" name="thumbnail_url" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

        <a href="/admin/products" class="btn btn-secondary">
            Batal
        </a>

    </form>

</div>

</body>
</html>