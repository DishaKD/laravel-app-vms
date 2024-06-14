@foreach ($products as $product)
    <!-- Edit Modal for each product -->
    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm{{ $product->id }}"
                        action="{{ route('product.status', ['product_id' => $product->id]) }}" method="post">
                        @csrf
                        @method('POST')

                        <!-- Update Status (dropdown) -->
                        <div class="form-group">
                            <label for="editUpdateStatus{{ $product->id }}">Update Status</label>
                            <select class="form-control" id="editUpdateStatus{{ $product->id }}" name="update_status"
                                required>
                                <option value="0" {{ $product->update_status == 0 ? 'selected' : '' }}>Not
                                    Approved</option>
                                <option value="1" {{ $product->update_status == 1 ? 'selected' : '' }}>Approved
                                </option>
                            </select>
                        </div>

                        <!-- Hidden fields for other data -->
                        <input type="hidden" name="product_title" value="{{ $product->product_title }}">
                        <input type="hidden" name="product_sku" value="{{ $product->product_sku }}">
                        <input type="hidden" name="category" value="{{ $product->category }}">
                        <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                        <input type="hidden" name="order_from" value="{{ $product->order_from }}">
                        <input type="hidden" name="order_by" value="{{ $product->order_by }}">
                        <input type="hidden" name="contact_info" value="{{ $product->contact_info }}">
                        <input type="hidden" name="special_instructions" value="{{ $product->special_instructions }}">

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
                var productId = $(this).data('product_id');
                var status = $(this).data('status');

                // Populate modal fields
                $('#editModal' + productId).find('#editUpdateStatus' + productId).val(status);
            });

            // Reset modal form on close
            $('[id^="editModal"]').on('hidden.bs.modal', function(event) {
                $(this).find('form')[0].reset();
            });
        });
    </script>
@endsection
