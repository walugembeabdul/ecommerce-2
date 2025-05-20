@extends("vendor.layout")
@section("title")
<p class="text-center text-uppercase text-bold">view vendor product</p>
@endsection
@section("content")
<div class="container mt-5">
    <h2 class="mb-4 text-center">Each Product</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm">
                @if($product->images->first())
                    <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" class="card-img-top" alt="{{ $product->product_name }}">
                @else
                    <img src="{{asset("asset\Lux 20220328_074256.jpg")}}" class="card-img-top" alt="No image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                    <ul class="list-unstyled small">
                        <li><strong>Price:</strong> ${{ $product->regular_price }}</li>
                        <li><strong>Discount:</strong> ${{ $product->discounted_price ?? 'N/A' }}</li>
                        <li><strong>Stock:</strong> {{ $product->stock_quantity }}</li>
                        <li><strong>SKU:</strong> {{ $product->sku }}</li>
                        <li><strong>category name:</strong> {{ $product->category->name }}</li>
                        <li><strong>subcategory name:</strong> {{ $product->subcategory->name }}</li>

                    </ul>

                </div>
            </div>
        </div>

</div>
@endsection

