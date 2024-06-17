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
        </div>

        <div class="form-container">
            <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form6Example1" class="form-control" />
                            <label class="form-label" for="form6Example1">Product name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form6Example2" class="form-control" />
                            <label class="form-label" for="form6Example2">Product SKU</label>
                        </div>
                    </div>
                </div>

                <!-- Dropdown for Category -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <select id="form6Example3" class="form-control">
                        <option value="" disabled selected>Select a category</option>
                        <option value="smartphones">Smartphones</option>
                        <option value="laptops">Laptops</option>
                        <option value="tablets">Tablets</option>
                        <option value="wearables">Wearables</option>
                        <option value="accessories">Accessories</option>
                    </select>
                    <label class="form-label" for="form6Example3">Category</label>
                </div>

                <!-- Text input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form6Example4" class="form-control" />
                    <label class="form-label" for="form6Example4">Initial Price</label>
                </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form6Example5" class="form-control" />
                    <label class="form-label" for="form6Example5">Selling Price</label>
                </div>

                <!-- Number input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="form6Example6" class="form-control" />
                    <label class="form-label" for="form6Example6">Stock</label>
                </div>

                <!-- Submit button -->
                <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Add Product</button>
            </form>
        </div>
    </div>
@endsection
