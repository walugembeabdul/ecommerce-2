
@extends("admin.layout")
@section("admin_layout")
<h1 class="text-bold text-Primary justify-content-between">categories lists</h1>
@endsection
@section("content")

<div class="row">
    <div class="col">
        <div class="card bg-primary">
            <div class="card-header">
                <h5 class="card-title mb-0">single category</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>subName</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td>{{$categories->name}}</td>
                                <td class="btn btn-danger btn-bordered">Delete</td>
                            </tr>

                    </tbody>
                </table>
            </div>
            <div class="card-body ">

            </div>
        </div>

@endsection
