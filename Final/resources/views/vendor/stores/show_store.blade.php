
@extends("vendor.layout")
@section("title")
<h1 class="text-bold text-Primary justify-content-between">vendor lists</h1>
@endsection
@section("content")

<div class="row">
    <div class="col">
        <div class="card bg-primary">
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
                @endif


            </div>
            <div class="card-header">
                <h5 class="card-title mb-0">All vendor's items</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>vendor item Name</th>
                            <th>vendor item slug</th>
                            <th>vendor item description</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $store )
                          <tr>
                            <td>{{$store->name}}</td>
                            <td>{{$store->slug}}</td>
                            <td>{{$store->description}}</td>
                            <td>
                                <a href="{{route("edit_stores",$store->id)}}" class="btn btn-outline-success p-1 mt-2">Edit</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body ">

            </div>
        </div>

@endsection
