@extends("admin.layout")
@section("admin_layout")
<h1 class="text-bold text-Primary justify-content-between">Create Sub_categories</h1>
@endsection
@section("content")

<div class="row">
    <div class="col">
        <div class="card bg-info">
            <div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                            </div>
                            <div class="text-success">
                                @if(session('success')){
                                    <div class="alert alert-success">
                                        {{session("success")}}
                                        </div>
                                }
                                @endif


                            </div>
            <div class="card-header">
                <h5 class="card-title mb-0">Add new Sub_categpry</h5>
            </div>
            <div class="card-body ">
                <form action="{{route("store_Subcategory")}}" method="post">
                    @csrf
                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">Enter Subcategory name</label>
                        <input value="{{old("name")}}" name="name" type="text" class="form-control" placeholder="Subcategory name">
                    </div>

<div class="form-float mt-4 mb-2 px-3 py-4 p-1">

    <label for="category_id" class="mt-4 mb-2 form-floating">Category_id</label>
    <select class="form-control" name="category_id" id="category_id">
    @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>      </div>
                <button class="btn btn-primary float-between ">Add Item</button>
            </form>
            </div>
        </div>

@endsection
