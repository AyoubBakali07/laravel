@extends('layouts.app')

@section('content')     
<div class="container">
    <div class="row justify-content-center">

</div>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow mt-3">
            <!-- Product Image -->
            <img data-src="https://via.placeholder.com/286x180" class="lazyload card-img-top" alt="{{ $product->name }}">
            {{-- <img src="https://via.placeholder.com/286x180" class="card-img-top" alt="{{ $product->name }}"> --}}
            <div class="card-body">
                <!-- Product Title -->
                <h5 class="card-title">{{ $product->name }}</h5>
                
                <!-- Product Price -->
                <h6 class="card-subtitle mb-2 text-success">
                    ${{ number_format($product->price, 2) }}
                </h6>
                
                <!-- Product Description -->
                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                
                <!-- Product Details -->
                <div class="product-meta small text-muted mb-3">
                    <div>SKU: {{ $product->sku ?? '53652719' }}</div>
                    <div>Stock: {{ $product->stock ?? '75' }}</div>
                    <div>Category: {{ $product->category->name ?? 'test' }}</div>
                </div>
            </div>  
        </div>
    </div>
    @endforeach
</div>

@if($products->isEmpty())
<div class="alert alert-info mt-4">
    No products found. Create your first product!
</div>
@endif
@endsection
