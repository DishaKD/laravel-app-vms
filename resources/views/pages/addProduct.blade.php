@extends('layouts.app')

@section('content')

    <body class="h-100 text-center text-white bg-dark">

        <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">


            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="product_title" id="productTitle" class="form-control" required
                                minlength="3" />
                            <label class="form-label" for="productTitle">Product Title</label>
                            <div class="invalid-feedback">Product Title is required and should be at least 3 characters
                                long.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <select id="category" class="form-control" name="category" required>
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
                            <label class="form-label" for="category">Category</label>
                            <div class="invalid-feedback">Category is required.</div>
                        </div>
                    </div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" name="quantity" id="quantity" class="form-control" required min="1" />
                    <label class="form-label" for="quantity">Quantity</label>
                    <div class="invalid-feedback">Quantity is required and should be at least 1.</div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <select id="status" class="form-control" name="status" required>
                        <option value="">Choose status</option>
                        <option value="approved">Approved</option>
                        <option value="not_approved">Not Approved</option>
                    </select>
                    <label class="form-label" for="status">Status</label>
                    <div class="invalid-feedback">Status is required.</div>
                </div>

                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
            </form>



        </div>

    </body>
@endsection
