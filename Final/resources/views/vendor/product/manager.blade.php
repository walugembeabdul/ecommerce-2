@extends("vendor.layout")
@section("title")
<p class="text-center text-uppercase text-bold">All vendor products</p>
@endsection
@section("content")
<div class="container mt-5">
    <h2 class="mb-4 text-center">All Products</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($products as $product)
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


                    </ul>
                    <a href="{{route("view_single_product",$product->id)}}" class="btn btn-primary btn-sm mt-2">View</a>
                    <a href="{{route("edit_vendor_product",$product->id)}}" class="btn btn-warning btn-sm mt-2">Edit</a>
                    <a href="{{route("delete_vendor_pdts",$product->id)}}" class="btn btn-danger btn-sm mt-2">Delete</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">No products found.</div>
        </div>
        @endforelse
    </div>
    {{$products->links()}}
</div>
@endsection

