@extends('layouts.app')

@section('content')
    <!-- Button to trigger modal -->
    <button class="btn btn-primary" id="show">Add Product</button>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Product Form -->
                    <form id="product-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Table -->
    <table class="table" id="product-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr id="product-{{ $product->id }}">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <button class="btn btn-danger delete-product" data-id="{{ $product->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Show modal
            $('#show').click(function (e) {
                e.preventDefault();
                $('#productModal').modal('show');
            });

            // Submit form via AJAX
            $('#product-form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('product.store') }}",
                    data: $(this).serialize(),
                    success: function (response) {
                        // Append new row
                        const newRow = `
                            <tr id="product-${response.id}">
                                <td>${response.name}</td>
                                <td>${response.description}</td>
                                <td>
                                    <button class="btn btn-danger delete-product" data-id="${response.id}">Delete</button>
                                </td>
                            </tr>
                        `;
                        $('#product-table tbody').append(newRow);
                        
                        // Reset form and hide modal
                        $('#product-form')[0].reset();
                        $('#productModal').modal('hide');
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Delete product via AJAX
            $(document).on('click', '.delete-product', function () {
                const productId = $(this).data('id');
                $.ajax({
                    type: 'DELETE',
                    url: `/product/${productId}`,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function () {
                        $(`#product-${productId}`).remove();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection