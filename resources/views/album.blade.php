@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/AlbumList.js') }}></script>
@stop
@section('content')
    <div class="container">
        <div>
            <h1>Albums</h1>
            <a href="{{ url('/album/create-album/') }}"><button type="button" class="btn btn-success">Create Album</button></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        @if ($column == 'id' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'id', 'sort'=>'desc'] ) }}">#</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'id', 'sort'=>'asc'] ) }}">#</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'name' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'name', 'sort'=>'desc'] ) }}">Album Name</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'name', 'sort'=>'asc'] ) }}">Album Name</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'recorded_date' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'recorded_date', 'sort'=>'desc'] ) }}">Recorded Date</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'recorded_date', 'sort'=>'asc'] ) }}">Recorded Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'release_date' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'release_date', 'sort'=>'desc'] ) }}">Release Date</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'release_date', 'sort'=>'asc'] ) }}">Release Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'number_of_tracks' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'number_of_tracks', 'sort'=>'desc'] ) }}">Number of Tracks</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'number_of_tracks', 'sort'=>'asc'] ) }}">Number of Tracks</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'label' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'label', 'sort'=>'desc'] ) }}">Label</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'label', 'sort'=>'asc'] ) }}">Label</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'producer' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'producer', 'sort'=>'desc'] ) }}">Producer</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'producer', 'sort'=>'asc'] ) }}">Producer</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'genre' && $sort == 'asc')
                            <a href="{{ url('/album', ['column'=>'genre', 'sort'=>'desc'] ) }}">Genre</a>
                        @else
                            <a href="{{ url('/album', ['column'=>'genre', 'sort'=>'asc'] ) }}">Genre</a>
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