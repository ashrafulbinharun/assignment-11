@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="text-center mb-3">Sell Products</h1>

                <div class="mb-3">
                    <label for="categoryFilter" class="form-label">Select Category:</label>
                    <select class="form-select" id="categoryFilter" name="category" onchange="location = this.value;">
                        <option value="{{ route('products.sell.create') }}"
                            {{ $selectedCategory === '' ? 'selected' : '' }}>
                            All Categories
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ route('products.sell.create', ['category' => $category->category]) }}"
                                {{ $selectedCategory === $category->category ? 'selected' : '' }}>
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <form method="post" action="{{ route('products.sell') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product Name:</label>
                        <select class="form-select" name="product_id">
                            <option value="" disabled selected>Select a product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity_sold" class="form-label">Quantity Sold:</label>
                        <input type="number" class="form-control" name="quantity_sold" required>
                    </div>

                    <button type="submit" class="btn btn-success">Sell Product</button>
                    <a href="{{ route('sales.history') }}" class="btn btn-primary">Go Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
