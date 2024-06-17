<!-- Edit Modal -->
@foreach ($products as $product)
    <!-- Edit Modal for each product -->
    <div class="modal fade text-dark" id="editModal{{ $product->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $product->id }}"> Edit Product </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: left;">
                    <form id="editProductForm{{ $product->id }}"
                        action="{{ route('admin.product.update', ['product_id' => $product->id]) }}" method="post">
                        @csrf

                        <!--Product Title-->
                        <div class="form-group">
                            <label for="editProductName{{ $product->id }}">Product Name</label>
                            <input type="text" class="form-control" id="editProductName{{ $product->id }}"
                                name="product_name" value="{{ $product->product_name }}" required>
                        </div>

                        <!--Product SKU-->
                        <div class="form-group">
                            <label for="editProductSku{{ $product->id }}">Product SKU</label>
                            <input type="text" class="form-control" id="editProductSku{{ $product->id }}"
                                name="product_sku" value="{{ $product->product_sku }}" required>
                        </div>

                        <!--Catergory-->
                        <div class="form-group">
                            <label for="editCategory{{ $product->id }}">Category</label>
                            <select class="form-control" id="editCategory{{ $product->id }}" name="category" required>
                                <option value="laptops" {{ $product->category === 'laptops' ? 'selected' : '' }}>
                                    Laptops</option>
                                <option value="smartphones"
                                    {{ $product->category === 'smartphones' ? 'selected' : '' }}>Smartphones</option>
                                <option value="tablets" {{ $product->category === 'tablets' ? 'selected' : '' }}>
                                    Tablets</option>
                                <option value="smartwatches"
                                    {{ $product->category === 'smartwatches' ? 'selected' : '' }}>
                                    Smartwatches</option>
                                <option value="headphones" {{ $product->category === 'headphones' ? 'selected' : '' }}>
                                    Headphones</option>
                                <option value="speakers" {{ $product->category === 'speakers' ? 'selected' : '' }}>
                                    Speakers</option>
                                <option value="cameras" {{ $product->category === 'cameras' ? 'selected' : '' }}>
                                    Cameras</option>
                                <option value="printers" {{ $product->category === 'printers' ? 'selected' : '' }}>
                                    Printers</option>
                                <option value="monitors" {{ $product->category === 'monitors' ? 'selected' : '' }}>
                                    Monitors</option>
                                <option value="keyboards" {{ $product->category === 'keyboards' ? 'selected' : '' }}>
                                    Keyboards</option>
                            </select>
                        </div>

                        <!--Quantity-->
                        <div class="form-group">
                            <label for="editInitialPrice{{ $product->id }}">Initial Price</label>
                            <input type="number" class="form-control" id="editInitialPrice{{ $product->id }}"
                                name="initial_price" value="{{ $product->initial_price }}" required>
                        </div>

                        <!--Warehouse-->
                        <div class="form-group">
                            <label for="editSellingPrice{{ $product->id }}">Selling Price</label>
                            <input type="number" class="form-control" id="editSellingPrice{{ $product->id }}"
                                name="selling_price" value="{{ $product->selling_price }}" required>
                        </div>

                        <div class="form-group">
                            <label for="editStocks{{ $product->id }}">Current Stocks</label>
                            <input type="text" class="form-control" id="editStocks{{ $product->id }}"
                                name="stock" value="{{ $product->stock }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach


@section('scripts')
    <script>
        $(document).ready(function() {
            // Populate modal fields when Edit button is clicked
            $('[data-target^="#editModal"]').on('click', function() {
                var productId = $(this).data('product-id');
                var productName = $(this).data('product-name');
                var productSku = $(this).data('product-sku');
                var category = $(this).data('category');
                var initialPrice = $(this).data('initial-price');
                var sellingPrice = $(this).data('selling-price');
                var stock = $(this).data('stock');

                // Populate modal fields
                $('#editModal' + productId).find('#editProductName').val(productName);
                $('#editModal' + productId).find('#editProductSku').val(productSku);
                $('#editModal' + productId).find('#editCategory').val(category);
                $('#editModal' + productId).find('#editInitialPrice').val(initialPrice);
                $('#editModal' + productId).find('#editSellingPrice').val(sellingPrice);
                $('#editModal' + productId).find('#editStock').val(stock);
            });

            // Reset modal form on close
            $('[id^="editModal"]').on('hidden.bs.modal', function(event) {
                $(this).find('form')[0].reset();
            });
        });
    </script>
@endsection
