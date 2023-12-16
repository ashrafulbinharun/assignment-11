@extends('layout.master')

@push('styles')
    <style>
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center mb-3">All Products</h1>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        @if (count($products) > 0)
                            <table class="table table-striped table-hover mb-3" id="dataTable">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->unit_price }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $product->id }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                        <!-- Modal for Delete -->
                                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="deleteModal{{ $product->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center w-100"
                                                            id="confirmDeleteModalLabel{{ $product->id }}">
                                                            Confirm
                                                            Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        Are you sure you want to delete this product?
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form method="post"
                                                            action="{{ route('products.destroy', $product->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">
                                <p>No products yet.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="mt-3">
                            <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
                            <a href="{{ route('products.sell.create') }}" class="btn btn-primary">Sell Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthMenu: [5, 10, 25, 50, 75, 100],
                    pagingType: 'simple',
                });
            });
        </script>
    @endpush
@endsection
