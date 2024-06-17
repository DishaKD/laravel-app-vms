@extends('layouts.admin')

@section('content')
    @include('components.admin.editModalProducts')
    <style>
        .form-container {
            display: flex;
            justify-content: flex-start;
            padding: 20px;
        }

        .form-container form {
            width: 100%;
            max-width: 600px;
        }
    </style>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <a href="{{ route('admin.generate.product.report') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

        <!-- Table Section -->
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAll" />
                        </div>
                    </th>
                    <th>Product Image</th>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product SKU</th>
                    <th>Category</th>
                    <th>Initial Price (LKR)</th>
                    <th>Selling Price (LKR)</th>
                    <th>Current Stock</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input product-checkbox" type="checkbox"
                                    data-product-id="{{ $product->id }}" />
                            </div>
                        </td>
                        <td>{{ $product->image_path }}</td>

                        <td>
                            <p class="fw-normal mb-1">{{ $product->id }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->product_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->product_sku }}</p>
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->initial_price }}</td>
                        <td>{{ $product->selling_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->created_at }}</td>


                        <td>
                            <a href="javascript:void(0)">
                                <button type="button" class="btn btn-link btn-sm btn-rounded" data-toggle="modal"
                                    data-target="#editModal{{ $product->id }}"
                                    data-product-title="{{ $product->product_name }}"
                                    data-product-sku="{{ $product->product_sku }}"
                                    data-category="{{ $product->category }}" data-quantity="{{ $product->initial_price }}"
                                    data-order-from="{{ $product->selling_price }}" data-order-by="{{ $product->stock }}"
                                    data-contact-info="{{ $product->image_path }}"
                                    data-status="{{ $product->created_at }}">
                                    Edit
                                </button>
                            </a>
                            <a href="{{ route('product.delete', $product->id) }}">
                                <i class="bi bi-trash" style="font-size: 1.5rem; color: rgb(255, 0, 0);"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
