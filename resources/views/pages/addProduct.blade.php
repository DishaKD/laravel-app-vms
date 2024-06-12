<!-- Example of enhanced UI for the product request form -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center">
        <h2 class="mb-4">Request Product to your warehouse</h2>
        <p class="mb-4">Please fill out the form below to request an order.</p>

        <form action="{{ route('product.store') }}" method="post" style="max-width: 500px; width: 100%;">
            @csrf
            <div class="mb-4">
                <div class="row">
                    <!-- product title field -->
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="product_title" id="productTitle"
                                class="form-control bg-dark text-white border-white" required minlength="3"
                                placeholder="Product Title" />
                        </div>
                    </div>
                    <!-- product sku field -->
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="product_sku" id="productSku"
                                class="form-control bg-dark text-white border-white" required minlength="3"
                                placeholder="Product SKU" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- catergory selector -->
            <div class="form-outline mb-4">
                <select id="category" class="form-control bg-dark text-white border-white" name="category" required>
                    <option value="">Choose category</option>
                    <option value="laptops">Laptops</option>
                    <option value="smartphones">Smartphones</option>
                    <option value="tablets">Tablets</option>
                    <option value="smartwatches">Smartwatches</option>
                    <option value="headphones">Headphones</option>
                    <option value="speakers">Speakers</option>
                    <option value="cameras">Cameras</option>
                    <option value="printers">Printers</option>
                    <option value="monitors">Monitors</option>
                    <option value="keyboards">Keyboards</option>
                </select>
            </div>

            <!-- quantity field -->
            <div class="form-outline mb-4" style="width: 100%;">
                <input type="number" name="quantity" id="quantity" class="form-control bg-dark text-white border-white"
                    required min="1" placeholder="Quantity" />
            </div>

            <!-- warehouse selection field -->
            <div class="form-outline mb-4" style="width: 100%;">
                <select name="order_from" id="from" class="form-control bg-dark text-white border-white" required>
                    <option value="" selected disabled>Select Warehouse</option>
                    <option value="Ampara">Galle</option>
                    <option value="Anuradhapura">Kandy</option>
                    <option value="Badulla">Gampaha</option>
                    <option value="Batticaloa">Kalutara</option>
                    <option value="Colombo">Colombo</option>
                    <!-- Add more options for other districts -->
                </select>
            </div>

            <!-- order by field -->
            <div class="form-outline mb-4" style="width: 100%;">
                <input type="text" name="order_by" id="customerName" class="form-control bg-dark text-white border-white"
                    required minlength="3" placeholder="Order By (Customer Name)" />
            </div>

            <!-- contact info field -->
            <div class="form-outline mb-4" style="width: 100%;">
                <input type="text" name="contact_info" id="deliveryAddress"
                    class="form-control bg-dark text-white border-white" required placeholder="Contact Person (Phone)" />
            </div>

            <!-- special instructions field -->
            <div class="form-outline mb-4" style="width: 100%;">
                <textarea name="special_instructions" id="specialInstructions" class="form-control bg-dark text-white border-white"
                    rows="4" placeholder="Special Instructions"></textarea>
            </div>

            <!-- submit button -->
            <button type="submit" class="btn btn-primary btn-block" style="width: 200px;">
                <span class="" role="status" aria-hidden="true"></span>
                Request Order
            </button>
        </form>
    </div>
@endsection
