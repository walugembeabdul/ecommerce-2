@extends("vendor.layout")
@section("title")
create vendor products page
@endsection
<br>
<br>

@section("content")
<div class="container " >
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-head mt-2 text-center mb-2 p-3"><h1>create vendor products</h1></div>
                <div class="card-body">
                    <form action="{{route("vendor_store_prodduct")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 p-4 ">
                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product name</label>
                            <input name="product_name" type="text" class="form-control" id="title" value="{{old("product_name")}}">
                            @error("product_name")
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                        </div>
                        <div class=" form-group mb-3 p-4">
                            <label for="text" class="form-label">description </label>
                            <textarea class="form-control" type="text" name="description" id="description" cols="3" rows="4" value="{{old("description")}}"></textarea>
                            @error("description")
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                        </div>
                          <div class=" form-group mb-3 p-4">
                            <label for="sku" class="form-label">product sku</label>
                            <input name="sku" type="text" class="form-control" id="sku" value="{{old("sku")}}">
                            @error("sku")
                            <span class="text-danger text-center">{{$message}}</span>

                            @enderror
                        </div>
                                    <div class=" form-group mb-3 p-4">
                                        <label for="file" class="form-label">upload product images </label>
                                        <input name="images[]" multiple type="file" class="border bordered-grey-100 rounded p-2 mt-2 mb-4 w-full width=20%" id="date" value="{{old("file")}}">
                                        @error("images")
                                        <span class="text-danger text-center">{{$message}}</span>

                                        @enderror
                                    </div>
                                    <livewire:categorySubcategory >
                                        <div class="mb-3 p-4">
                                            <label for="vendor_store_id">selectet vendor stores id</label>
                                            <select class="form-control mb-3 p-4" name="vendor_store_id" id="vendor_store_id">
                                                @foreach ($stores as $store)
                                                <option value="{{$store->id}}">{{$store->name}}</option>
                                                @endforeach
                                            </select>
                                            @error("vendor_store_id")
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                                        </div>
                                        <div class="form-group mb-3 p-4">
                                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product regural price</label>
                                            <input name="regular_price" type="number" class="form-control" id="regular_price" value="{{old("regular_price")}}">
                                            @error("regular_price")
                                            <span class="text-danger text-center">{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 p-4">
                                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product discounted_price</label>
                                            <input name="discounted_price" type="number" class="form-control" id="discounted_price" value="{{old("discounted_price")}}">
                                            @error("discounted_price")
                                            <span class="text-danger text-center">{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 p-4">
                                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product taxe_rate</label>
                                            <input name="taxe_rate" type="number" class="form-control" id="taxe_rate" value="{{old("taxe_rate")}}">
                                            @error("taxe_rate")
                                            <span class="text-danger text-center">{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 p-4">
                                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product stock_quantity</label>
                                            <input name="stock_quantity" type="number" class="form-control" id="stock_quantity" value="{{old("stock_quantity")}}">
                                            @error("stock_quantity")
                                            <span class="text-danger text-center">{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 p-4 ">
                                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product slug </label>
                                            <input name="slug" type="text" class="form-control" id="slug " value="{{old("slug")}}">
                                            @error("slug")
                                            <span class="text-danger text-center">{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 p-4 ">
                                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product meta_title </label>
                                            <input name="meta_title" type="text" class="form-control" id="slug " value="{{old("meta_title")}}">
                                            @error("meta_title")
                                            <span class="text-danger text-center">{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 p-4 ">
                                            <label for="exampleFormControlInput1" class="inline-block text-lg mb-2">product meta_description </label>
                                            <input name="meta_description" type="text" class="form-control" id="meta_description " value="{{old("meta_description")}}">
                                            @error("meta_description")
                                            <span class="text-danger text-center">{{$message}}</span>

                                            @enderror
                                        </div>



                        </div>

                          <div class="card">
                            <div class="cardbody mx-4 p-2">
                                  <button name="add" type="submit" class="btn btn-success text-xr float flex">Add Product</button>
                                </div>
                                </div>
                    </form>
                </div>
            </div>
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
    </div>
</div>
@endif
</div>

@endsection
