@extends('layouts.admin')

@section('content')
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

        <div class="form-container">
            <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form6Example1" class="form-control" />
                            <label class="form-label" for="form6Example1">First name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form6Example2" class="form-control" />
                            <label class="form-label" for="form6Example2">Last name</label>
                        </div>
                    </div>
                </div>

                <!-- Text input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form6Example3" class="form-control" />
                    <label class="form-label" for="form6Example3">Company name</label>
                </div>

                <!-- Text input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form6Example4" class="form-control" />
                    <label class="form-label" for="form6Example4">Address</label>
                </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form6Example5" class="form-control" />
                    <label class="form-label" for="form6Example5">Email</label>
                </div>

                <!-- Number input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="form6Example6" class="form-control" />
                    <label class="form-label" for="form6Example6">Phone</label>
                </div>

                <!-- Submit button -->
                <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Place order</button>
            </form>
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
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product SKU</th>
                    <th>Category</th>
                    <th>Initial Price</th>
                    <th>Selling Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($products as $product)
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
                @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
