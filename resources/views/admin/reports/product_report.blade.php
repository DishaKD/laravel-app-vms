<!-- resources/views/admin/reports/product_report.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .address {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <div>
            <img src="{{ public_path('images/logo.png') }}" alt="Company Logo">
        </div>
        <div class="address">
            <p>WMS (PVT) Ltd,</p>
            <p>Colombo - 01,</p>
            <p>Sri Lanka</p>
        </div>
    </div>

    <h1 style="text-align: center;">Product Report</h1>

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Initial Price (LKR)</th>
                <th>Selling Price (LKR)</th>
                <th>Stocks</th>
                <th>Date Added</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_sku }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->initial_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
