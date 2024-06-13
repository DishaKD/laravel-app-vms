@extends('layouts.app')

@section('content')
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <main class="px-3">
            <h1>Warehouse Management System</h1>
            <p class="lead">Welcome to the Warehouse Management System. This platform is designed to streamline the process
                for warehouse managers to request bulk orders for their facilities. Once a request is made, our system
                efficiently processes it, ensuring timely and accurate fulfillment to optimize your warehouse operations.
            </p>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img src="https://images.pexels.com/photos/4246109/pexels-photo-4246109.jpeg?auto=compress&cs=tinysrgb&w=600"
                        class="img-fluid" alt="Warehouse">
                </div>
                <div class="col-md-6">
                    <img src="https://images.pexels.com/photos/1797428/pexels-photo-1797428.jpeg?auto=compress&cs=tinysrgb&w=600"
                        class="img-fluid" alt="Management">
                </div>
            </div>

            <div class="text-start mt-4 ">
                <p class="lead">Our Warehouse Management System offers the following services:</p>
                <div class="row">
                    <div class="col-md-2">
                        <div class="card mb-4 h-100 text-dark">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-box fa-2x"></i>
                                </div>
                                <h5 class="card-title">Bulk Order Requests</h5>
                                <p class="card-text">Submit bulk order requests for warehouse inventory efficiently.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-4 h-100 text-dark">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-cogs fa-2x"></i>
                                </div>
                                <h5 class="card-title">Automated Order Processing</h5>
                                <p class="card-text">Experience seamless and automated order processing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-4 h-100 text-dark">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-chart-line fa-2x"></i>
                                </div>
                                <h5 class="card-title">Real-Time Inventory Tracking</h5>
                                <p class="card-text">Keep track of your inventory in real-time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-4 h-100 text-dark">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-bell fa-2x"></i>
                                </div>
                                <h5 class="card-title">Order Status Updates</h5>
                                <p class="card-text">Receive updates and notifications on order statuses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-4 h-100 text-dark">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-file-alt fa-2x"></i>
                                </div>
                                <h5 class="card-title">Detailed Reporting</h5>
                                <p class="card-text">Access comprehensive reports and analytics.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-4 h-100 text-dark">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-network-wired fa-2x"></i>
                                </div>
                                <h5 class="card-title">ERP Integration</h5>
                                <p class="card-text">Integrate with existing ERP systems for a smooth workflow.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
@endsection
