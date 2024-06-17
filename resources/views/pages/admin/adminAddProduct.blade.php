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
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
        </div>

        <div class="form-container">

            <form>
                <!-- Product Name and SKU -->
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

                <!-- Category Dropdown -->
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

                <!-- Prices Inputs -->
                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form6Example4" class="form-control" />
                            <label class="form-label" for="form6Example4">Initial Price</label>
                        </div>
                    </div>
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form6Example5" class="form-control" />
                            <label class="form-label" for="form6Example5">Selling Price</label>
                        </div>
                    </div>
                </div>

                <!-- Stock Input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="form6Example6" class="form-control" />
                    <label class="form-label" for="form6Example6">Stock</label>
                </div>

                <!-- Image Input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    <label class="form-label" for="form6Example6">Add Image</label>
                </div>

                <!-- Submit button -->
                <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Add Product</button>
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
            var productNameInput = document.getElementById('form6Example1');
            var productSKUInput = document.getElementById('form6Example2');
            var categoryInput = document.getElementById('form6Example3');
            var initialPriceInput = document.getElementById('form6Example4');
            var sellingPriceInput = document.getElementById('form6Example5');
            var stockInput = document.getElementById('form6Example6');
            var imageInput = document.getElementById('validatedCustomFile');
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
