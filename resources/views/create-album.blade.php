@extends('app')

@section('content')
    <div class="container">
        <h1>Create Album</h1><br><br>
        <form method="POST" action="{{ action('AlbumController@create') }}" role="form">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="band-id">Select Band</label>
                <select class="form-control" id="band-id" name="band-id">
                    @foreach($bands as $band)
                        <option value={{ $band->id }}>{{ $band->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="album-name">Album Name</label>
                <input class="form-control" id="album-name" name="album-name" placeholder="Enter Band Name">
            </div>
            <div class="form-group">
                <label for="recorded-date">Recorded Date</label>
                <input class="form-control" id="recorded-date" name="recorded-date" placeholder="Enter Recorded Date">
            </div>
            <div class="form-group">
                <label for="release-date">Release Date</label>
                <input class="form-control" id="release-date" name="release-date" placeholder="Enter Release Date">
            </div>
            <div class="form-group">
                <label for="number-of-tracks">Number of Tracks</label>
                <input class="form-control" id="number-of-tracks" name="number-of-tracks" placeholder="Enter Number of Tracks">
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input class="form-control" id="label" name="label" placeholder="Enter Label">
            </div>
            <div class="form-group">
                <label for="producer">Producer</label>
                <input class="form-control" id="producer" name="producer" placeholder="Enter Producer">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input class="form-control" id="genre" name="genre" placeholder="Enter Genre">
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection