@extends('admin.layouts.app')
@section('content')

<div class="container pt-5">

    <table class="table text-dark">
        <tr>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Doctor name</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach ($appointments as $appointment)
        <tr>
            <td>{{$appointment->name}}</td>
            <td>{{$appointment->email}}</td>
            <td>{{$appointment->phone}}</td>
            <td>{{$appointment->doctor}}</td>
            <td>{{$appointment->date}}</td>
            <td>{{$appointment->message}}</td>
            <td>{{$appointment->status}}</td>
            <td>
                @if ($appointment->status == 'approved')
                <a href="{{route('cancle', $appointment->id)}}"  class="btn btn-danger">Cancle</a>
                @else
                <a href="{{route('approve', $appointment->id)}}" class="btn btn-success">Approve</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>


@endsection
