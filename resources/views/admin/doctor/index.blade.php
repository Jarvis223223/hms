@extends('admin.layouts.app')
@section('content')

<div class="container-fluid page-body-wrapper">
    @if (session()->has('successMsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('successMsg')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{route('doctors.create')}}" class="btn btn-primary float-end mx-4">Add</a>
    <div class="container "  style="padding-top: 50px">

        <table class="table text-dark">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Specialty</th>
                <th>Room No</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->specialty}}</td>
                <td>{{$doctor->room}}</td>
                <td>
                    <img class="img-fluid" style="width: 100px;height: 100px" src="../storage/form-images/{{$doctor->image}}" alt="">
                </td>
                <td>
                    <form action="{{route('doctors.destroy', $doctor->id)}}" method="post">
                        @csrf @method("delete")
                        <a href="{{route('doctors.edit', $doctor->id)}}"  class="btn btn-info ">Edit</a>

                        <button  class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
