@extends('app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Band Name</th>
                <th>Website</th>
                <th>Start Date</th>
                <th>Active</th>
            </tr>
            </thead>
            <tbody>
                @foreach($bands as $band)
                <tr>
                    <th scope="row">{{$band->id}}</th>
                    <td>{{$band->name}}</td>
                    <td>{{$band->website}}</td>
                    <td>{{$band->start_date}}</td>
                    @if($band->still_active)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection