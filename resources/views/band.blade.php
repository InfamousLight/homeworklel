@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/BandList.js') }}></script>
@stop
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
                <tr id="band-row-{{$band->id}}">
                    <th scope="row">{{$band->id}}</th>
                    <td>{{$band->name}}</td>
                    <td>{{$band->website}}</td>
                    <td>{{$band->start_date}}</td>
                    @if($band->still_active)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                    <td>
                        <a href="{{ url('/band/edit-band/' . $band->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button id="{{$band->id}}" type = "button" class="delete btn btn-danger delete-band">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection