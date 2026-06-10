<!DOCTYPE html>
<html>
<head>
    <title>Kelola Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Kelola Pesanan</h1>

    <a href="/admin" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status Saat Ini</th>
                <th width="300">Ubah Status</th>
            </tr>
        </thead>

        <tbody>

        @foreach($orders as $order)

            <tr>

                <td>{{ $order->id }}</td>

                <td>{{ $order->user_id }}</td>

                <td>${{ $order->total_price }}</td>

                <td>

                    @if($order->status == 'Completed')
                        <span class="badge bg-success">
                            Completed
                        </span>

                    @elseif($order->status == 'Pending')
                        <span class="badge bg-warning text-dark">
                            Pending
                        </span>

                    @elseif($order->status == 'Processing')
                        <span class="badge bg-primary">
                            Processing
                        </span>

                    @elseif($order->status == 'Cancelled')
                        <span class="badge bg-danger">
                            Cancelled
                        </span>

                    @else
                        <span class="badge bg-secondary">
                            {{ $order->status }}
                        </span>
                    @endif

                </td>

                <td>

                    <form action="/admin/orders/{{ $order->id }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <select
                            name="status"
                            class="form-select mb-2"
                            {{ in_array($order->status, ['Completed', 'Cancelled']) ? 'disabled' : '' }}
                        >

                            @if($order->status == 'Pending')

                                <option value="Pending" selected>
                                    Pending
                                </option>

                                <option value="Processing">
                                    Processing
                                </option>

                                <option value="Cancelled">
                                    Cancelled
                                </option>

                            @elseif($order->status == 'Processing')

                                <option value="Processing" selected>
                                    Processing
                                </option>

                                <option value="Completed">
                                    Completed
                                </option>

                                <option value="Cancelled">
                                    Cancelled
                                </option>

                            @elseif($order->status == 'Completed')

                                <option value="Completed" selected>
                                    Completed
                                </option>

                            @elseif($order->status == 'Cancelled')

                                <option value="Cancelled" selected>
                                    Cancelled
                                </option>

                            @endif

                        </select>

                        <button
                            type="submit"
                            class="btn btn-primary btn-sm"
                            {{ in_array($order->status, ['Completed', 'Cancelled']) ? 'disabled' : '' }}
                        >
                            Update Status
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