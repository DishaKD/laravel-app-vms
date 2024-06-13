@extends('layouts.app')

@section('content')
    @include('components.editModal')
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <!-- Heading Section -->
        <div class="mb-4">
            <h2>Request Product Dashboard</h2>
        </div>

        <!-- Instructions -->
        <div class="mb-4">
            <p>Click "Edit" to modify a product request.</p>
            <p>Click "Delete" to remove a product request.</p>
        </div>

        <!-- Search Input -->
        <div class="row mb-3">
            <div class="col-md-4">
                <form method="get" action="{{ route('productsView') }}">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" name="search" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" value="{{ request()->input('search') }}" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="bi bi-search" style="color: black;"></i>
                        </span>
                    </div>
                </form>
            </div>
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
                        <td>
                            <a href="javascript:void(0)">
                                <button type="button" class="btn btn-link btn-sm btn-rounded" data-toggle="modal"
                                    data-target="#editModal{{ $product->id }}"
                                    data-product-title="{{ $product->product_title }}"
                                    data-product-sku="{{ $product->product_sku }}"
                                    data-category="{{ $product->category }}" data-quantity="{{ $product->quantity }}"
                                    data-order-from="{{ $product->order_from }}" data-order-by="{{ $product->order_by }}"
                                    data-contact-info="{{ $product->contact_info }}"
                                    data-special-instructions="{{ $product->special_instructions }}">
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


    @push('js')
        <script>
            $(document).ready(function() {
                // JavaScript logic for select all checkboxes
                $('#selectAll').change(function() {
                    $('.product-checkbox').prop('checked', $(this).prop('checked'));
                });

                $('.product-checkbox').change(function() {
                    if (!$(this).prop('checked')) {
                        $('#selectAll').prop('checked', false);
                    }
                });
            });
        </script>
    @endpush
@endsection
