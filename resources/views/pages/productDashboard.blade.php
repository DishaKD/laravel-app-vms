@extends('layouts.app')

@section('content')

    <body class="h-100 text-center text-white bg-dark">

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">


            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Title</th>
                        <th>Catergory</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <p class="fw-normal mb-1">{{ $product->id }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $product->product_title }}</p>
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
                                <button type="button" class="btn btn-link btn-sm btn-rounded">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>

    </body>
@endsection
