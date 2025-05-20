<section>
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
         <button wire:click="filterBycategory(null)" class="btn  btn-success 'hot">All products</button>
        <br>
         <div>
                @foreach ($categories as $category)
                        <button wire:click="filterBycategory({{$category->id}})" class="btn  {{$selectedcategory===$category->id
                        ? 'hot' : 'btn-info'}}">{{$category->name}}</button>

                    @endforeach
            </div>
        <div class="row px-xl-5 pb-3">

            @forelse ($products as $product )
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">

                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                         @if($product->images->first())
                    <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" class="card-img-top" alt="{{ $product->product_name }}">
                @else
                    <img src="{{asset("asset\Lux 20220328_074256.jpg")}}" class="card-img-top" alt="No image">
                @endif
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$product->product_name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6 class="text-muted ml-2">${{$product->regular_price}}</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{route("detail",$product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                       <div class="add-cart-wrap" x-data="{ quantity: 1 }">
    <input
        type="number"
        min="1"
        max="{{ $product->stock_quantity }}"
        class="form-control form-control-sm mb-2"
        x-model="quantity"
    />

    <button wire:click="addToCart({{ $product->id }})" class="btn btn-sm text-dark p-0">
        <a
            href="javascript:void(0)"
            @click='$dispatch("addcartFromAnywhere", { productid: {{ $product->id }}, quantity: quantity })'
        >
            Add To Cart
        </a>
    </button>
</div>


                    </div>
                </div>
            </div>
@empty
<div class="col-12 text-center ">
<h5>No product found for this category</h5>
</div>
            @endforelse

        </div>
    </div>
    <!-- Products End -->

</section>
