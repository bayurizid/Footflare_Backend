<!DOCTYPE html>
<html>
<head>
    <title>FootFlare Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Dashboard Admin FootFlare</h1>

    <div class="row">

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <h2>{{ $totalProduk }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total User</h5>
                    <h2>{{ $totalUser }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total Pesanan</h5>
                    <h2>{{ $totalPesanan }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-5">
        <a href="/admin/products" class="btn btn-primary">
            Kelola Produk
        </a>

        <a href="/admin/orders" class="btn btn-success">
            Kelola Pesanan
        </a>
    </div>

</div>

</body>
</html>