@extends('layouts.app')
@section('content')
{{-- <button><a id="show" class="btn btn-primary" href="{{route('products.create')}}">Add product</a></button> --}}
<a id="show" class="btn btn-primary m-3" href="{{ route('products.create') }}">Add Product</a>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $product->id }}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>  

    </tbody>
  </table>
@endsection
{{-- product show --}}
@section('script')
<script>
    $(document).ready(function () {
        $(document).on('click', '#show', function (e) {
            e.preventDefault(); 

            let url = $(this).attr('href');

            $.ajax({
                type: "GET",
                url: url,
                success: function (res) {
                    bootbox.dialog({
                        title: "Create Producte",
                        message: "<div class='createForm'></div>",

                    });

                    $('.createForm').html(res);
                }
            });
        });
    });
    {{-- products submission code --}}

    $(document).on('submite','#addProduct', function(e){
        e.preventDefault();


        let formData = new FormData($('#addProduct')[0]);

        $.ajax({
            type: 'POST',
            url: "{{route('products.store')}}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {


            }
        })
    })
    // code for delete
    $(document).on('click', '.delete-btn', function (e) {
        e.preventDefault();
        let productId  = $(this).data('id');
        let $row = $(this).closest('tr');
        $.ajax({
            type: "DELETE",
            url: "/products/"+ productId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                $row.remove();
            },
            error: function() {
                alert('Error deleting product');
            }
    }); 
        });
            
</script>

@endsection