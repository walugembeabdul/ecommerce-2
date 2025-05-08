@extends("admin.layout")
@section("admin_layout")
All default attributes by admin
@endsection
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-title text_between text-dark">
                    <h1>admin attributes</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center mt-1 px-2">
                            <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$defaulatattributes->name}}</td>
                                <td>
                                    <a class="btn btn-success px-2 py-2" href="{{route("edit_attributes",$defaulatattributes->id)}}">Edit</a>              </td>
                                {{-- <td class="text-primary text-center"><a href="{{route("single_attributes",$arts->id)}}">Readmore!</a></td> --}}
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
