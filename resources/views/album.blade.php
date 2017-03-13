@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/AlbumList.js') }}></script>
@stop
@section('content')
    <div class="container">
        <div class="album-list-header-container">
            <h1>Albums</h1>
            <div class="album-list-create-row">
                <a href="{{ url('/album/create-album/') }}"><button type="button" class="btn btn-success">Create Album</button></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        @if ($column == 'id' && $sort == 'asc')
                            <a href="{{ url('/album?column=id&order=desc') }}">#</a>
                        @else
                            <a href="{{ url('/album?column=id&order=asc') }}">#</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'name' && $sort == 'asc')
                            <a href="{{ url('/album?column=name&order=desc') }}">Album Name</a>
                        @else
                            <a href="{{ url('/album?column=name&order=asc') }}">Album Name</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'recorded_date' && $sort == 'asc')
                            <a href="{{ url('/album?column=recorded_date&order=desc') }}">Recorded Date</a>
                        @else
                            <a href="{{ url('/album?column=recorded_date&order=asc') }}">Recorded Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'release_date' && $sort == 'asc')
                            <a href="{{ url('/album?column=release_date&order=desc') }}">Release Date</a>
                        @else
                            <a href="{{ url('/album?column=release_date&order=asc') }}">Release Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'number_of_tracks' && $sort == 'asc')
                            <a href="{{ url('/album?column=number_of_tracks&order=desc') }}">Number of Tracks</a>
                        @else
                            <a href="{{ url('/album?column=number_of_tracks&order=asc') }}">Number of Tracks</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'label' && $sort == 'asc')
                            <a href="{{ url('/album?column=label&order=desc') }}">Label</a>
                        @else
                            <a href="{{ url('/album?column=label&order=asc') }}">Label</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'producer' && $sort == 'asc')
                            <a href="{{ url('/album?column=producer&order=desc') }}">Producer</a>
                        @else
                            <a href="{{ url('/album?column=producer&order=asc') }}">Producer</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'genre' && $sort == 'asc')
                            <a href="{{ url('/album?column=genre&order=desc') }}">Genre</a>
                        @else
                            <a href="{{ url('/album?column=genre&order=asc') }}">Genre</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'band_id' && $sort == 'asc')
                            <a href="{{ url('/album?column=band_id&order=desc') }}">Band</a>
                        @else
                            <a href="{{ url('/album?column=band_id&order=asc') }}">Band</a>
                        @endif
                    </th>
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
                    <td>{{$album->band->name}}</td>
                    <td>
                        <a href="{{ url('/album/edit-album/' . $album->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button id="{{$album->id}}" type="button" class="delete btn btn-danger delete-album">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection