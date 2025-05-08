@extends("admin.layout")
@section("admin_layout")
<h1 class="text-bold text-Primary justify-content-between">Update Subcategories</h1>
@endsection
@section("content")

<div class="row">
    <div class="col">
        <div class="card bg-success">
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
                <h5 class="card-title mb-0">Update sub_category</h5>
            </div>
            <div class="card-body ">
                <form action="{{route("update_sub",$subcategories->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">update subcategory name</label>
                        <input value="{{($subcategories->name)}}" name="name" type="text" class="form-control" placeholder="category name">
                    </div>

                <button class="btn btn-success float-between ">Update sub_item</button>
            </form>
            </div>
        </div>

@endsection
