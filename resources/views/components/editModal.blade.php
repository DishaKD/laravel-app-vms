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
                        action="{{ route('product.update', ['product_id' => $product->id]) }}" method="post">
                        @csrf

                        <!--Product Title-->
                        <div class="form-group">
                            <label for="editProductTitle{{ $product->id }}">Product Title</label>
                            <input type="text" class="form-control" id="editProductTitle{{ $product->id }}"
                                name="product_title" value="{{ $product->product_title }}" required>
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
                            <label for="editQuantity{{ $product->id }}">Quantity</label>
                            <input type="number" class="form-control" id="editQuantity{{ $product->id }}"
                                name="quantity" value="{{ $product->quantity }}" required>
                        </div>

                        <!--Warehouse-->
                        <div class="form-group">
                            <label for="editOrderFrom{{ $product->id }}">Update Warehouse</label>
                            <select class="form-control" id="editOrderFrom{{ $product->id }}" name="order-from"
                                required>
                                <option value="Galle" {{ $product->order_from === 'Galle' ? 'selected' : '' }}>
                                    Galle</option>
                                <option value="Kandy" {{ $product->order_from === 'Kandy' ? 'selected' : '' }}>Kandy
                                </option>
                                <option value="Gampaha" {{ $product->order_from === 'Gampaha' ? 'selected' : '' }}>
                                    Gampaha</option>
                                <option value="Kalutara" {{ $product->order_from === 'Kalutara' ? 'selected' : '' }}>
                                    Kalutara</option>
                                <option value="Colombo" {{ $product->order_from === 'Colombo' ? 'selected' : '' }}>
                                    Colombo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="editOrderBy{{ $product->id }}">Order By (Customer Name)</label>
                            <input type="text" class="form-control" id="editOrderBy{{ $product->id }}"
                                name="order-by" value="{{ $product->order_by }}" required>
                        </div>

                        <div class="form-group">
                            <label for="editContactInfo{{ $product->id }}">Contact Person (Phone)</label>
                            <input type="text" class="form-control" id="editContactInfo{{ $product->id }}"
                                name="contact-info" value="{{ $product->contact_info }}" required>
                        </div>

                        <div class="form-group">
                            <label for="editSpecialInstructions{{ $product->id }}">Contact Person (Phone)</label>
                            <input type="text" class="form-control" id="editSpecialInstructions{{ $product->id }}"
                                name="special-instructions" value="{{ $product->special_instructions }}" required>
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
                var productTitle = $(this).data('product-title');
                var productSku = $(this).data('product-sku');
                var category = $(this).data('category');
                var quantity = $(this).data('quantity');
                var orderFrom = $(this).data('order-from');
                var orderBy = $(this).data('order-by');
                var contactInfo = $(this).data('contact-info');
                var specialInstructions = $(this).data('special-instructions');

                // Populate modal fields
                $('#editModal' + productId).find('#editProductTitle').val(productTitle);
                $('#editModal' + productId).find('#editProductSku').val(productSku);
                $('#editModal' + productId).find('#editCategory').val(category);
                $('#editModal' + productId).find('#editQuantity').val(quantity);
                $('#editModal' + productId).find('#editOrderFrom').val(orderFrom);
                $('#editModal' + productId).find('#editOrderBy').val(orderBy);
                $('#editModal' + productId).find('#editContactInfo').val(contactInfo);
                $('#editModal' + productId).find('#editSpecialInstructions').val(specialInstructions);
            });

            // Reset modal form on close
            $('[id^="editModal"]').on('hidden.bs.modal', function(event) {
                $(this).find('form')[0].reset();
            });
        });
    </script>
@endsection
