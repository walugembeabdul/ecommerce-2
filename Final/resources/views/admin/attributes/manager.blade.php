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
                            @foreach ($defaulatattributes as $arts )
                            <tr>
                                <td>{{$arts->name}}
                                    <br>
                                    <a class="text-primary text-center" href="{{route("single_attributes",$arts->id)}}">Readmore!</a>
                                </td>

                                <td >
                                    <a class="btn btn-success p-1" href="{{route("edit_attributes",$arts->id)}}">Edit</a>
                                <form action={{route("delete_arts",$arts->id)}} method="post">
                                    @csrf
                                    @method("delete")
                                    <input type="submit" value="delete" name="delete" id="delete" class="btn btn-outline-danger p-1">
                                </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
