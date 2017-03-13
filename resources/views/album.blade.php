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
        <form method="GET" action="{{ action('AlbumController@index') }}" role="form">
            <div class="form-group">
                <label for="band-id">Select Band to Filter</label>
                <select class="form-control" id="band_id" name="band_id">
                    <option disabled selected value> -- select to filter -- </option>
                    @foreach($bands as $band)
                        <option value={{ $band->id }}>{{ $band->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        @if ($column == 'id' && $sort == 'asc')
                            <a href="{{ url('/album?column=id&order=desc&band_id=' . app('request')->input('band_id')) }}">#</a>
                        @else
                            <a href="{{ url('/album?column=id&order=asc&band_id=' . app('request')->input('band_id')) }}">#</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'name' && $sort == 'asc')
                            <a href="{{ url('/album?column=name&order=desc&band_id=' . app('request')->input('band_id')) }}">Album Name</a>
                        @else
                            <a href="{{ url('/album?column=name&order=asc&band_id=' . app('request')->input('band_id')) }}">Album Name</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'recorded_date' && $sort == 'asc')
                            <a href="{{ url('/album?column=recorded_date&order=desc&band_id=' . app('request')->input('band_id')) }}">Recorded Date</a>
                        @else
                            <a href="{{ url('/album?column=recorded_date&order=asc&band_id=' . app('request')->input('band_id')) }}">Recorded Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'release_date' && $sort == 'asc')
                            <a href="{{ url('/album?column=release_date&order=desc&band_id=' . app('request')->input('band_id')) }}">Release Date</a>
                        @else
                            <a href="{{ url('/album?column=release_date&order=asc&band_id=' . app('request')->input('band_id')) }}">Release Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'number_of_tracks' && $sort == 'asc')
                            <a href="{{ url('/album?column=number_of_tracks&order=desc&band_id=' . app('request')->input('band_id')) }}">Number of Tracks</a>
                        @else
                            <a href="{{ url('/album?column=number_of_tracks&order=asc&band_id=' . app('request')->input('band_id')) }}">Number of Tracks</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'label' && $sort == 'asc')
                            <a href="{{ url('/album?column=label&order=desc&band_id=' . app('request')->input('band_id')) }}">Label</a>
                        @else
                            <a href="{{ url('/album?column=label&order=asc&band_id=' . app('request')->input('band_id')) }}">Label</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'producer' && $sort == 'asc')
                            <a href="{{ url('/album?column=producer&order=desc&band_id=' . app('request')->input('band_id')) }}">Producer</a>
                        @else
                            <a href="{{ url('/album?column=producer&order=asc&band_id=' . app('request')->input('band_id')) }}">Producer</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'genre' && $sort == 'asc')
                            <a href="{{ url('/album?column=genre&order=desc&band_id=' . app('request')->input('band_id')) }}">Genre</a>
                        @else
                            <a href="{{ url('/album?column=genre&order=asc&band_id=' . app('request')->input('band_id')) }}">Genre</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'band_id' && $sort == 'asc')
                            <a href="{{ url('/album?column=band_id&order=desc&band_id=' . app('request')->input('band_id')) }}">Band</a>
                        @else
                            <a href="{{ url('/album?column=band_id&order=asc&band_id=' . app('request')->input('band_id')) }}">Band</a>
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