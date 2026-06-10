<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - FootFlare</title>
    
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

        /* Container Card Form */
        .form-section {
            background: var(--section-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 14px;
        }

        /* Input Styling Customization */
        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            color: #334155;
            font-size: 0.9rem;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: #a5b4fc;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        /* Modern Buttons styling */
        .btn-modern {
            border-radius: 10px;
            padding: 11px 24px;
            font-weight: 600;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
            border: none;
        }

        .btn-save-action {
            background-color: var(--color-product);
            color: #ffffff;
        }
        .btn-save-action:hover {
            background-color: #4338ca;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }

        .btn-cancel-action {
            background-color: #ffffff;
            color: #475569;
            border: 1px solid var(--border-color);
        }
        .btn-cancel-action:hover {
            background-color: #f8fafc;
            color: #1e293b;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container py-5" style="max-width: 1200px;">

    <!-- Center layout for form spacing -->
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">

            <!-- Header Section -->
            <div class="mb-4">
                <h2 class="fw-bold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Tambah Produk</h2>
                <p class="mb-0 text-muted small">Tambahkan item sepatu baru ke dalam katalog <span class="fw-semibold" style="color: var(--color-product);">FootFlare</span></p>
            </div>

            <!-- Form Container Box -->
            <div class="form-section p-4 shadow-sm">
                <form action="/admin/products" method="POST" class="form-card p-4 shadow-xs">
                    
                    @csrf

                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama produk lengkap" required>
                    </div>

                    <!-- Row: Harga & Diskon berdampingan -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga (Rupiah)</label>
                            <input type="number" name="price" class="form-control" placeholder="Contoh: 750000" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Diskon (%)</label>
                            <input type="number" name="discount_percentage" class="form-control" value="0" min="0" max="100">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Produk</label>
                        <textarea name="description" class="form-control" placeholder="Tuliskan deskripsi detail produk di sini..."></textarea>
                    </div>

                    <!-- Row: Brand ID & Category ID berdampingan -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Brand ID</label>
                            <input type="number" name="brand_id" class="form-control" placeholder="Masukkan ID Brand" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category ID</label>
                            <input type="number" name="category_id" class="form-control" placeholder="Masukkan ID Kategori" required>
                        </div>
                    </div>

                    <!-- Thumbnail URL -->
                    <div class="mb-4">
                        <label class="form-label">Thumbnail URL</label>
                        <input type="text" name="thumbnail_url" class="form-control" placeholder="Contoh: https://link-gambar.com/sepatu.jpg">
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="/admin/products" class="btn btn-modern btn-cancel-action shadow-sm">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-modern btn-save-action shadow-sm">
                            <i class="bi bi-check-lg"></i> Simpan Produk
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>