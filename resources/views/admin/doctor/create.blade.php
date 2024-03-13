@extends('admin.layouts.app')
@section('content')

<div class="container-fluid page-body-wrapper">
    <h3 class="ms-4">Doctor Create Form</h3>
    <a href="{{route('doctors.index')}}" class="btn btn-primary float-end mx-4">Back</a>

    <div class="container"  style="padding-top: 50px">
        <form action="{{route('doctors.store')}}" method="post" enctype="multipart/form-data">
            @csrf @method('post')
            <div class="mb-3">
                <label for="">Doctor Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Phone </label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                @error('phone')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Specialty</label>
                <select name="specialty" class="form-control @error('specialty') is-invalid @enderror">
                    <option value="">Select</option>
                    <option value="nose">Nose</option>
                    <option value="skin">Skin</option>
                    <option value="eye">Eye</option>
                </select>
                @error("specialty")
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Room No</label>
                <input type="text" class="form-control @error('room') is-invalid @enderror" name="room">
                @error('room')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="">Doctor Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
