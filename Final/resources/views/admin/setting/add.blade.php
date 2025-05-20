@extends("admin.layout")
@section("admin_layout")
<h1 class="text-bold text-Primary justify-content-between">Create settings</h1>
@endsection
@section("content")
<div class="container">
<div class="row">
    <div class="col">
        <div class="card bg-primary">
            <div class="card-header">
                <h5 class="card-title mb-0">Add new homepage settings</h5>
            </div>
            <div class="card-body ">
                <form action="{{route("up_settings")}}" method="post">
                    @csrf
                    @method("Put")
                    <div class="form-float  mb-3 p-3 ">
                        <label for="forminput">discounted_product_id</label>
                        <select class="form-control" name="discounted_product_id" id="discounted_product_id">
                            @foreach ($products as $product )
                                <option value="{{$product->id}}" {{$homepage->discounted_product_id==$product->id?"selected" :''}}>{{$product->product_name}}</option>
                            @endforeach

                        </select>
                        @error("discounted_product_id")

                        <Span class="text text-danger text-bold">{{message}}</Span>

                        @enderror
                    </div>
                    <div class="form-float  mt-4 mb-2">
                        <label for="forminput">discount_title</label>
                        <input value="{{$homepage->discount_title}}" type="text" name="discount_title" class="form-control  mb-3 p-2">
                        @error("discount_title")

                        <Span class="text text-danger text-bold">{{message}}</Span>

                        @enderror
                    </div>
                    <div class="form-float mt-4 mb-2">
                        <label for="forminput">discount_percentage</label>
                        <input value="{{$homepage->discount_percentage}}" type="number" name="discount_percentage" class="form-control  mb-3 p-2">
                        @error("discount_percentage")

                        <Span class="text text-danger text-bold">{{message}}</Span>

                        @enderror
                          <div class="form-float mt-4 mb-2">
                        <label for="forminput" class="mt-4 mb-2">product_1_id </label>
                        <select class="form-control" name="product_1_id" id="product_1_id">
                            @foreach ($products as $product )
                                <option value="{{$product->id}}" {{$homepage->product_1_id==$product->id? "selected" : ''}}>{{$product->product_name}}</option>
                            @endforeach

                        </select>
                        @error("product_2_id ")

                        <Span class="text text-danger text-bold">{{message}}</Span>

                        @enderror
                    </div>


                    <div class="form-float mt-4 mb-2">
                        <label for="forminput" class="mt-4 mb-2">product_2_id </label>
                        <select class="form-control" name="product_2_id" id="product_2_id">
                            @foreach ($products as $product )
                                <option value="{{$product->id}}" {{$homepage->product_2_id==$product->id? "selected" : ''}}>{{$product->product_name}}</option>
                            @endforeach

                        </select>
                        @error("product_2_id ")

                        <Span class="text text-danger text-bold">{{message}}</Span>

                        @enderror
                    </div>

                <button class="btn btn-primary">Update Homepage settings</button>
            </form>
            </div>
        </div>
         <div>
    @if(@session()->has("success"))
<div class="alert alert-secondary">
    {{session()->get("success")}}
</div>
@endif
@if(@session("error"))
<div class="alert alert-danger">
    {{session("error")}}
    @endif
    </div>
</div>
</div>
@endsection
