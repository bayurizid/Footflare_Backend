<!DOCTYPE html>
<html>
<head>
    <title>Kelola Produk FootFlare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Kelola Produk FootFlare</h1>

    <div class="mb-3">

        <a href="/admin" class="btn btn-secondary">
            Kembali
        </a>

        <a href="/admin/products/create" class="btn btn-success">
            Tambah Produk
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @foreach($products as $product)

            <tr>

                <td>{{ $product->id }}</td>

                <td>{{ $product->name }}</td>

                <td>
                    Rp {{ number_format($product->price,0,',','.') }}
                </td>

                <td>
                    {{ $product->discount_percentage }}%
                </td>

                <td>

                    <a href="/admin/products/{{ $product->id }}/edit"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="/admin/products/{{ $product->id }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>