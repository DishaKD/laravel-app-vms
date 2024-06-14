@extends('layouts.admin')

@section('content')
    @include('components.admin.adminEditModal')
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
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
                    <th>Order ID</th>
                    <th>Product Title</th>
                    <th>Product SKU</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Special Instructions</th>
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
                        <td>
                            <p class="fw-normal mb-1">{{ $product->id }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->product_title }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->product_sku }}</p>
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            @if ($product->status)
                                <span class="badge badge-success rounded-pill d-inline">Approved</span>
                            @else
                                <span class="badge badge-danger rounded-pill d-inline">Not Approved</span>
                            @endif
                        </td>
                        <td>{{ $product->special_instructions }}</td>
                        <td>
                            <a href="javascript:void(0)">
                                <button type="button" class="btn btn-link btn-sm btn-rounded" data-toggle="modal"
                                    data-target="#editModal{{ $product->id }}"
                                    data-product-title="{{ $product->product_title }}"
                                    data-product-sku="{{ $product->product_sku }}"
                                    data-category="{{ $product->category }}" data-quantity="{{ $product->quantity }}"
                                    data-order-from="{{ $product->order_from }}" data-order-by="{{ $product->order_by }}"
                                    data-contact-info="{{ $product->contact_info }}" data-status="{{ $product->status }}"
                                    data-special-instructions="{{ $product->special_instructions }}">
                                    Update Status
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
