
@extends("admin.layout")
@section("admin_layout")
<h1 class="text-bold text-Primary justify-content-between">Sub_categories lists</h1>
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
                <h5 class="card-title mb-0">All Sub_category</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Sub-category Name</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $subcategories as $subcategory)
                            <tr>
                                <td class="text-bold">{{$subcategory->name}}
                                    <br>
                                    <a href="{{route("single_sub",$subcategory->id)}}" class="btn btn-primary">Readmore</a>
                                </td>
                                  {{--  <td>{{$subcategory->Category->name}}</td> --}}
                                <td>
                                  <form action="{{ route('delete_sub', $subcategory->id) }}" method="post" >
                                        @csrf
                                        @method("delete")
                                        <input type="submit" name="delete" value="delete" class="btn btn-outline-danger px-1 py-1 mt-1 mb-1">
                                    </form>

                                  <a href="{{route("edit_sub",$subcategory->id)}}"class="btn btn-outline-success px-1 py-1 mt-1 mb-1">Edit</a>

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
