@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1 class="text-center mb-3">Sales History</h1>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title fs-5"> <i class="bi bi-emoji-laughing me-2"></i>
                                    Today's Sale</h5>
                                <h2 class="card-text">{{ number_format($todaySale) }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title fs-5"> <i class="bi bi-cash-coin me-2"></i>Yesterday's Sale</h5>
                                <h2 class="card-text">{{ number_format($yesterdaySale) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title fs-5"> <i class="bi bi-calendar-check me-2"></i>
                                    This Month's Sale</h5>
                                <h2 class="card-text">{{ number_format($thisMonthSale) }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title fs-5"> <i class="bi bi-safe me-2"></i>
                                    Last Month's Sale</h5>
                                <h2 class="card-text">{{ number_format($lastMonthSale) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
