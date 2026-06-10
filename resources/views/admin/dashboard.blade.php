<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootFlare Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg-main: #ebf0f5;            /* Sedikit lebih gelap agar kartu putih lebih pop-out */
            --card-bg: #ffffff;
            --section-bg: #f5f8fc;         /* Mengurangi dominasi putih di area tabel & aksi */
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            
            /* Modern UI Accent Colors */
            --color-product: #4f46e5;      /* Indigo */
            --color-user: #0284c7;         /* Sky Blue */
            --color-order: #10b981;        /* Emerald */
            --color-completed: #0d9488;    /* Teal */
        }

        body {
            background-color: var(--bg-main);
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-main);
        }

        /* Card Statistik */
        .custom-card {
            background: var(--card-bg);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 16px;
            transition: all 0.25s ease;
        }

        .custom-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(79, 70, 229, 0.06) !important;
        }

        /* Container Tabel & Aksi Cepat agar tidak putih polos */
        .content-section {
            background: var(--section-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
        }

        /* Modern Soft Gradient for Icons */
        .icon-shape {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .bg-gradient-product { background: linear-gradient(135deg, #6366f1, var(--color-product)); }
        .bg-gradient-user { background: linear-gradient(135deg, #38bdf8, var(--color-user)); }
        .bg-gradient-order { background: linear-gradient(135deg, #34d399, var(--color-order)); }
        .bg-gradient-completed { background: linear-gradient(135deg, #2dd4bf, var(--color-completed)); }

        /* Modern Table Customization */
        .table-responsive {
            border-radius: 14px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid var(--border-color);
        }

        .table thead th {
            background-color: #f1f5f9;
            color: var(--text-muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .table tbody td {
            padding: 16px 20px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Soft Contextual Badges */
        .badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        .bg-soft-success { background-color: #dcfce7; color: #15803d; }
        .bg-soft-primary { background-color: #dbeafe; color: #1d4ed8; }
        .bg-soft-danger { background-color: #fee2e2; color: #b91c1c; }
        .bg-soft-secondary { background-color: #f1f5f9; color: #475569; }

        /* Buttons Styling (Functional Semantic Colors) */
        .btn-modern {
            border-radius: 10px;
            padding: 11px 22px;
            font-weight: 600;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
            border: none;
        }

        .btn-product-action {
            background-color: var(--color-product);
            color: #ffffff;
        }
        .btn-product-action:hover {
            background-color: #4338ca;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }

        .btn-order-action {
            background-color: var(--color-order);
            color: #ffffff;
        }
        .btn-order-action:hover {
            background-color: #059669;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
        }

        /* Tombol Tambah Produk Kini Menggunakan Warna Kontras/Soft Indigo */
        .btn-create-action {
            background-color: #e0e7ff;
            color: var(--color-product);
            border: 1px solid #c7d2fe;
        }
        .btn-create-action:hover {
            background-color: #c7d2fe;
            color: #3730a3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);
        }
    </style>
</head>

<body>

<div class="container py-5" style="max-width: 1200px;">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Dashboard Admin</h2>
            <p class="mb-0 text-muted small">Selamat datang kembali di panel kendali <span class="fw-semibold" style="color: var(--color-product);">FootFlare</span></p>
        </div>
    </div>

    <div class="row g-4 mb-5">

        <div class="col-md-6 col-lg-3">
            <div class="card custom-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted d-block mb-1 fw-bold" style="font-size: 0.75rem; letter-spacing: 0.05em;">TOTAL PRODUK</span>
                            <h3 class="fw-bold mb-0 text-dark">{{ $totalProduk }}</h3>
                        </div>
                        <div class="icon-shape bg-gradient-product text-white shadow-sm">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card custom-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted d-block mb-1 fw-bold" style="font-size: 0.75rem; letter-spacing: 0.05em;">TOTAL USER</span>
                            <h3 class="fw-bold mb-0 text-dark">{{ $totalUser }}</h3>
                        </div>
                        <div class="icon-shape bg-gradient-user text-white shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card custom-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted d-block mb-1 fw-bold" style="font-size: 0.75rem; letter-spacing: 0.05em;">TOTAL PESANAN</span>
                            <h3 class="fw-bold mb-0 text-dark">{{ $totalPesanan }}</h3>
                        </div>
                        <div class="icon-shape bg-gradient-order text-white shadow-sm">
                            <i class="bi bi-cart-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card custom-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted d-block mb-1 fw-bold" style="font-size: 0.75rem; letter-spacing: 0.05em;">PESANAN SELESAI</span>
                            <h3 class="fw-bold mb-0 text-dark">{{ $totalCompleted }}</h3>
                        </div>
                        <div class="icon-shape bg-gradient-completed text-white shadow-sm">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="content-section p-4 mb-5">
        <div class="d-flex align-items-center mb-3">
            <h5 class="fw-bold mb-0" style="color: #0f172a;">
                <i class="bi bi-clock-history me-2" style="color: var(--color-product);"></i>Pesanan Terbaru
            </h5>
        </div>

        <div class="table-responsive border-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($recentOrders as $order)
                    <tr>
                        <td class="fw-semibold" style="color: var(--color-product);">#{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td class="fw-semibold">${{ number_format($order->total_price, 2) }}</td>
                        <td>
                            @if($order->status == 'Completed' || $order->status == 'Placed')
                                <span class="badge bg-soft-success">Completed</span>
                            @elseif($order->status == 'Processing')
                                <span class="badge bg-soft-primary">Processing</span>
                            @elseif($order->status == 'Cancelled')
                                <span class="badge bg-soft-danger">Cancelled</span>
                            @else
                                <span class="badge bg-soft-secondary">{{ $order->status }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox d-block fs-2 mb-2 text-secondary"></i>
                            Belum ada riwayat transaksi masuk
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-section p-4">
        <h5 class="fw-bold mb-3" style="color: #0f172a;">
            <i class="bi bi-lightning-charge-fill text-warning me-2"></i>Aksi Cepat Menu
        </h5>
        <div class="d-flex flex-wrap gap-2">
            <a href="/admin/products" class="btn btn-modern btn-product-action shadow-sm">
                <i class="bi bi-box-seam"></i> Kelola Produk
            </a>

            <a href="/admin/orders" class="btn btn-modern btn-order-action shadow-sm">
                <i class="bi bi-cart-check"></i> Kelola Pesanan
            </a>

            <a href="/admin/products/create" class="btn btn-modern btn-create-action shadow-sm">
                <i class="bi bi-plus-circle"></i> Tambah Produk Baru
            </a>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>