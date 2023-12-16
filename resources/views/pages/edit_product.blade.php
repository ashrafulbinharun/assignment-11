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

                <h1 class="text-center mb-3">Edit Product</h1>

                <form method="post" action="{{ route('products.update', $product->id) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <input type="text" class="form-control " name="category"
                            value="{{ old('category', $product->category) }}">
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="product_name"
                            value="{{ old('product_name', $product->name) }}">
                        @error('product_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" name="quantity"
                            value="{{ old('quantity', $product->quantity) }}">
                        @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Unit Price:</label>
                        <input type="text" class="form-control" name="unit_price"
                            value="{{ old('unit_price', $product->unit_price) }}">
                        @error('unit_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update Product</button>
                    <a href="{{ route('all.products') }}" class="btn btn-primary">Go Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
