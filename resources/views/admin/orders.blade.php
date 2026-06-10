<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - FootFlare</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .btn-update-action {
            background-color: var(--color-product);
            color: #ffffff;
            font-size: 0.8rem;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
            white-space: nowrap;
        }
        .btn-update-action:hover:not(:disabled) {
            background-color: #4338ca;
            color: #ffffff;
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

        /* Form Customization inside Table */
        .form-select-sm {
            border-radius: 8px;
            padding: 6px 32px 6px 12px;
            font-size: 0.85rem;
            color: #334155;
            border: 1px solid #cbd5e1;
            max-width: 140px;
        }
        .form-select-sm:focus {
            border-color: #a5b4fc;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
    </style>
</head>
<body>

<div class="container py-5" style="max-width: 1200px;">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">
        <div>
            <h2 class="fw-bold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Kelola Pesanan</h2>
            <p class="mb-0 text-muted small">Pantau log transaksi dan sesuaikan status pengiriman pesanan <span class="fw-semibold" style="color: var(--color-product);">FootFlare</span></p>
        </div>
        
        <div>
            <a href="/admin" class="btn btn-modern btn-back-action shadow-sm">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <div class="content-section p-4 shadow-sm">
        <div class="table-responsive border-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th width="100">ID Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Status Saat Ini</th>
                        <th width="280">Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="fw-semibold" style="color: var(--color-product);">#{{ $order->id }}</td>
                        <td class="text-dark fw-medium">{{ $order->user_id }}</td>
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
                        <td>
                            <form action="/admin/orders/{{ $order->id }}" method="POST" class="d-flex align-items-center gap-2">
                                @csrf
                                @method('PUT')

                                <select 
                                    name="status" 
                                    class="form-select form-select-sm"
                                    {{ in_array($order->status, ['Completed', 'Cancelled']) ? 'disabled' : '' }}
                                >
                                    @if($order->status == 'Placed')
                                        <option value="Placed" selected>Placed</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Cancelled">Cancelled</option>
                                    @elseif($order->status == 'Processing')
                                        <option value="Processing" selected>Processing</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    @elseif($order->status == 'Completed')
                                        <option value="Completed" selected>Completed</option>
                                    @elseif($order->status == 'Cancelled')
                                        <option value="Cancelled" selected>Cancelled</option>
                                    @endif
                                </select>

                                <button 
                                    type="submit" 
                                    class="btn btn-update-action"
                                    {{ in_array($order->status, ['Completed', 'Cancelled']) ? 'disabled' : '' }}
                                >
                                    <i class="bi bi-arrow-repeat"></i> Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>