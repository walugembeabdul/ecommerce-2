@extends("vendor.layout")
@section("title")
<h1 class="text-bold text-Primary justify-content-between">Update admin store items</h1>
@endsection
@section("content")

<div class="row">
    <div class="col">
        <div class="card bg-success">
            <div class="card-header">
                <h5 class="card-title mb-0">Update vendor items</h5>
            </div>
            <div class="card-body ">
                <form action="{{route("update_storage",$stores->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-float mt-2 mb-2 px-3 py-2 p-1">
                        <label for="forminput" class="mt-2 mb-2">item name</label>
                        <input value="{{($stores->name)}}" name="name" type="text" class="form-control">
                    @error("name")
                    <span class="text text-danger text-center mt-1 mb-1 p-1">{{"$message"}}</span>

                    @enderror
                    </div>
                    {{-- <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">item slug</label>
                        <input value="{{($stores->slug)}}" name="name" type="text" class="form-control">
                    @error("slug")
                    <span class="text text-danger text-center mt-1 mb-1 p-1">{{"$message"}}</span>

                    @enderror
                    </div>
                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">item description</label>
                        <textarea name="dsecription" id="dsecription" cols="3" rows="2" type="text" class="form-control"></textarea>
                    @error("description")
                    <span class="text text-danger text-center mt-1 mb-1 p-1">{{"$message"}}</span>

                    @enderror --}}
                    {{-- </div>
                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">item name</label>
                        <input value="{{($subcategories->name)}}" name="name" type="text" class="form-control">
                    @error("name")
                    <span class="text text-danger text-center mt-1 mb-1 p-1">{{"$message"}}</span>

                    @enderror
                    </div> --}}

                <button name="update" type="submit" class="btn btn-success float-between ">Update vendor_item</button>
            </form>
            </div>
        </div>

@endsection
