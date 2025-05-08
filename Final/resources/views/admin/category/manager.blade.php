
@extends("admin.layout")
@section("admin_layout")
<h1 class="text-bold text-Primary justify-content-between">categories lists</h1>
@endsection
@section("content")

<div class="row">
    <div class="col">
        <div class="card bg-primary">
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
            <div class="card-header">
                <h5 class="card-title mb-0">All categpry</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $categories as $category)
                            <tr>
                                <td><a href="{{route("single_items",$category->id)}}" class="text-bold">{{$category->name}}</a></td>
                                <td >
                                    <form action="{{route("delete_items",$category->id)}}" method="post">
                                        @csrf
                                        @method("delete")
                                       <input type="submit" name="delete" value="delete"  class="btn btn-danger bt-boardered">

                                </form>
                                <a href="{{route("edit_items",$category->id)}}" ><h1 class="btn btn-success">Edit</h1</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body ">

            </div>
        </div>

@endsection
