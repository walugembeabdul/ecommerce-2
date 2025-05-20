@extends("layouts.user")
@section("header")
<div><div class="container my-4">
    <div class="row">
        <!-- Big Image -->
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative" style="height: 410px;">
                <img class="img-fluid w-100 h-100" style="object-fit: cover;" src="{{ asset('storage/' .$homepage ->discounted_product->images->first()->image_path) }}" class="card-img-top" alt="{{ $homepage ->discounted_product->product_name }}">

 <ul>
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100">
                    <div class="p-3 bg-dark bg-opacity-50 text-center" style="max-width: 700px;">

                        <li class=" text-uppercase font-weight-medium mb-3 text-info text-sm">
                            {{ $homepage->discounted_product->product_name }}
                        </li>
                        <li class="text-light text-xsm text-uppercase font-weight-medium mb-3">
                            {{ $homepage->discount_title }} <br> on every {{ $date }}
                        </li>
                        <li class="text-light text-uppercase font-weight-medium mb-3 twxt-sm">
                            {{ $homepage->discount_percentage }}% Off Your First Order
                        </li>
                        <li class="text-sm text-white font-weight-semi-bold mb-4">{{$homepage->discounted_product->description}}</li>
                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                    </div>

                </div>
                 </ul>
            </div>
                </div>
            </div>

        </div>

        <!-- Two Smaller Images -->
        <div class="col-md-4 d-flex flex-column justify-content-between">
            <!-- First Small -->
            <div class="mb-3" style="height: 200px;">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100" style="object-fit: cover;" src="{{ asset('home_asset/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100">
                        <div class="p-2 bg-dark bg-opacity-50 text-center">
                            <p class="text-light text-uppercase font-weight-medium mb-1">{{$homepage->product1->product_name}}</p>
                            <p class="text-white font-weight-semi-bold">${{$homepage->product1->regular_price}} Price</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Small -->
            <div style="height: 200px;">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100" style="object-fit: cover;" src="{{ asset('home_asset/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100">
                        <div class="p-2 bg-dark bg-opacity-50 text-center">
                            <h4 class="text-light text-uppercase font-weight-medium mb-1">New Arrivals</h4>
                            <h5 class="text-white font-weight-semi-bold">Trendy Designs</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
