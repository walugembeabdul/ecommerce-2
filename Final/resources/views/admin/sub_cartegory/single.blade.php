@extends("admin.layout")
@section("title")
Single category page
@endsection
@section("content")
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-title">
                    single sub_category
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$subcategories->category->name}}</td>
                                    <td>{{$subcategories->name}}</td>
                                    <td>
                                        <button class="btn btn-outline-danger">Delete</button>
                                        <button class="btn btn-outline-success">Edit</button>

                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
