<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk FootFlare</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg-main: #ebf0f5;
            --card-bg: #ffffff;
            --section-bg: #f5f8fc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --color-product: #4f46e5;      /* Indigo Theme */
        }

        body {
            background-color: var(--bg-main);
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-main);
        }

        /* Container Section */
        .content-section {
            background: var(--section-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
        }

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

        /* Modern Buttons styling */
        .btn-modern {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
            border: none;
        }

        .btn-back-action {
            background-color: #ffffff;
            color: #475569;
            border: 1px solid var(--border-color);
        }
        .btn-back-action:hover {
            background-color: #f8fafc;
            color: #1e293b;
            transform: translateY(-2px);
        }

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

        /* Action Buttons inside Table */
        .btn-action-sm {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            border: none;
            transition: all 0.2s;
        }

        .btn-table-edit {
            background-color: #fef3c7;
            color: #d97706;
        }
        .btn-table-edit:hover {
            background-color: #fde68a;
            color: #b45309;
        }

        .btn-table-delete {
            background-color: #fee2e2;
            color: #dc2626;
        }
        .btn-table-delete:hover {
            background-color: #fca5a5;
            color: #b91c1c;
        }

        /* Badges for Discounts */
        .badge-discount {
            background-color: #ecfdf5;
            color: #059669;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.8rem;
            border: 1px solid #a7f3d0;
        }
        .badge-no-discount {
            background-color: #f1f5f9;
            color: #94a3b8;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

<div class="container py-5" style="max-width: 1200px;">

    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">
        <div>
            <h2 class="fw-bold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Kelola Produk</h2>
            <p class="mb-0 text-muted small">Atur katalog, harga, dan diskon produk <span class="fw-semibold" style="color: var(--color-product);">FootFlare</span></p>
        </div>
        
        <!-- Top Navigation Action -->
        <div class="d-flex gap-2">
            <a href="/admin" class="btn btn-modern btn-back-action shadow-sm">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>

            <a href="/admin/products/create" class="btn btn-modern btn-create-action shadow-sm">
                <i class="bi bi-plus-circle"></i> Tambah Produk Baru
            </a>
        </div>
    </div>

    <!-- Main Content Table Section -->
    <div class="content-section p-4 shadow-sm">
        <div class="table-responsive border-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="text-muted fw-medium">#{{ $product->id }}</td>
                        <td class="fw-semibold text-dark">{{ $product->name }}</td>
                        <td class="fw-semibold">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td>
                            @if($product->discount_percentage > 0)
                                <span class="badge-discount">
                                    <i class="bi bi-tags-fill me-1"></i>{{ $product->discount_percentage }}%
                                </span>
                            @else
                                <span class="badge-no-discount">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Button Edit -->
                                <a href="/admin/products/{{ $product->id }}/edit" class="btn-action-sm btn-table-edit">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <!-- Form Delete -->
                                <form action="/admin/products/{{ $product->id }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-sm btn-table-delete" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                        <i class="bi bi-trash3-fill"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>