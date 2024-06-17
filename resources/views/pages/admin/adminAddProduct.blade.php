@extends('layouts.admin')

@section('content')
    <style>
        .form-container {
            display: flex;
            justify-content: space-between;
            /* Adjust spacing between form and preview */
            padding: 20px;
        }

        .form-container form {
            width: 100%;
            max-width: 600px;
        }

        .product-preview {
            flex: 1;
            /* Take remaining space */
            padding: 20px;
            background-color: #f8f9fc;
            /* Example background color for distinction */
        }

        .preview-card {
            margin-bottom: 20px;
            /* Space below the card */
        }
    </style>

    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
        </div>

        <div class="form-container">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Product Name and SKU -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="product_sku">Product SKU</label>
                            <input type="text" id="product_sku" name="product_sku" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Category Dropdown -->
                <div class="form-group mb-4">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="smartphones">Smartphones</option>
                        <option value="laptops">Laptops</option>
                        <option value="tablets">Tablets</option>
                        <option value="wearables">Wearables</option>
                        <option value="accessories">Accessories</option>
                    </select>
                </div>

                <!-- Prices Inputs -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="initial_price">Initial Price</label>
                            <input type="text" id="initial_price" name="initial_price" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="selling_price">Selling Price</label>
                            <input type="text" id="selling_price" name="selling_price" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Stock Input -->
                <div class="form-group mb-4">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" required>
                </div>

                <!-- Image Input -->
                <div class="form-group mb-4">
                    <label for="product_image">Product Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="product_image" name="product_image" required>
                        <label class="custom-file-label" for="product_image">Choose file...</label>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Add Product</button>
            </form>

            <!-- Product Preview Panel -->
            <div class="product-preview">
                <div class="card preview-card">
                    <div class="card-header">
                        Product Preview
                    </div>
                    <div class="card-body">
                        <img id="previewImage" src="#" alt="Product Image Preview" class="img-fluid mb-3 d-none">
                        <h5 class="card-title" id="previewProductName">Product Name Preview</h5>
                        <p class="card-text" id="previewProductSKU">SKU Preview</p>
                        <p class="card-text" id="previewCategory">Category Preview</p>
                        <p class="card-text" id="previewPrices">Prices Preview</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productNameInput = document.getElementById('product_name');
            var productSKUInput = document.getElementById('product_sku');
            var categoryInput = document.getElementById('category');
            var initialPriceInput = document.getElementById('initial_price');
            var sellingPriceInput = document.getElementById('selling_price');
            var stockInput = document.getElementById('stock');
            var imageInput = document.getElementById('product_image');
            var imagePreview = document.getElementById('previewImage');
            var previewProductName = document.getElementById('previewProductName');
            var previewProductSKU = document.getElementById('previewProductSKU');
            var previewCategory = document.getElementById('previewCategory');
            var previewPrices = document.getElementById('previewPrices');

            productNameInput.addEventListener('input', function() {
                previewProductName.textContent = productNameInput.value;
            });

            productSKUInput.addEventListener('input', function() {
                previewProductSKU.textContent = productSKUInput.value;
            });

            categoryInput.addEventListener('change', function() {
                previewCategory.textContent = categoryInput.options[categoryInput.selectedIndex].text;
            });

            initialPriceInput.addEventListener('input', function() {
                updatePreview();
            });

            sellingPriceInput.addEventListener('input', function() {
                updatePreview();
            });

            stockInput.addEventListener('input', function() {
                updatePreview();
            });

            imageInput.addEventListener('change', function() {
                var file = imageInput.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });

            function updatePreview() {
                var initialPrice = initialPriceInput.value ? 'Initial Price: ' + initialPriceInput.value : '';
                var sellingPrice = sellingPriceInput.value ? 'Selling Price: ' + sellingPriceInput.value : '';
                var stock = stockInput.value ? 'Stock: ' + stockInput.value : '';

                // Combine all non-empty values for preview
                var previewContent = [initialPrice, sellingPrice, stock].filter(Boolean).join(' | ');

                // Update the preview panel
                previewPrices.textContent = previewContent;
            }
        });
    </script>
@endsection
