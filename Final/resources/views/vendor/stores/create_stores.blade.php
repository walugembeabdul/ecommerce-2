@extends("vendor.layout")
@section("title")
<h1 class="text-bold text-Primary justify-content-between">Create vendor store items</h1>
@endsection
@section("content")

<div class="row">
    <div class="col">
        <div class="card bg-info">

            <div class="card-header">
                <h5 class="card-title mb-0">create store</h5>
            </div>
            <div class="card-body ">
                <form action="{{route("add_stores")}}" method="post">
                    @csrf
                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">store name</label>
                        <input value="{{old("name")}}" name="name" type="text" class="form-control" placeholder="Subcategory name">
                        @error("name")
        <span class="text-danger">{{$message}}</span
        @enderror
                    </div>
                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">store slug</label>
                        <input value="{{old("slug")}}" name="slug" type="text" class="form-control" placeholder="slug name">
                        @error("slug")
                        <span class="text-danger">{{$message}}</span
                        @enderror
                    </div>

                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">store description</label>
                        <textarea  value="{{old("description")}}" name="description" type="text" class="form-control" placeholder="describe the items" cols="6" rows="10"></textarea>
                        @error("description")
        <span class="text-danger">{{$message}}</span
        @enderror
                    </div>
                    @if(@session()->has("success"))
<div class="alert alert-secondary">
    {{session()->get("success")}}
</div>
@endif
@if(@session("error"))
<div class="alert alert-danger">
    {{session("error")}}
</div>\
@endif


                <button class="btn btn-primary float-between ">Add stores</button>
            </form>

            </div>
        </div>

@endsection
