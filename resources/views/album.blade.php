@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/AlbumList.js') }}></script>
@stop
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Album Name</th>
                <th>Recorded Date</th>
                <th>Release Date</th>
                <th>Number of Tracks</th>
                <th>Label</th>
                <th>Producer</th>
                <th>Genre</th>
            </tr>
            </thead>
            <tbody>
                @foreach($albums as $album)
                <tr id="album-row-{{$album->id}}">
                    <th scope="row">{{$album->id}}</th>
                    <td>{{$album->name}}</td>
                    <td>{{$album->recorded_date}}</td>
                    <td>{{$album->release_date}}</td>
                    <td>{{$album->number_of_tracks}}</td>
                    <td>{{$album->label}}</td>
                    <td>{{$album->producer}}</td>
                    <td>{{$album->genre}}</td>
                    <td>
                        <a href="{{ url('/album/edit-album/' . $album->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button id="{{$album->id}}" type = "button" class="delete btn btn-danger delete-album">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection