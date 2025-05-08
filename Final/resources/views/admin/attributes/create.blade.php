@extends("admin.layout")
@section("admin_layout")
<h1 class="text-bold text-Primary justify-content-between">Create attributes</h1>
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
                <h5 class="card-title mb-0">Add new attributes</h5>
            </div>
            <div class="card-body ">
                <form action="{{route("store_attributes")}}" method="post">
                    @csrf
                    <div class="form-float mt-4 mb-2 px-3 py-4 p-1">
                        <label for="forminput" class="mt-4 mb-2">Enter attribute name</label>
                        <input value="{{old("name")}}" name="name" type="text" class="form-control" placeholder="attribute  name">
                    </div>

                <button class="btn btn-primary float-between ">Add Attribute</button>
            </form>
            </div>
        </div>

@endsection
