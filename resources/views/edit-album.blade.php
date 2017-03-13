@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/AlbumForm.js') }}></script>
@stop
@section('content')
    <div class="container">
        <h1>Edit Album - {{$album->name}}</h1>
        <h4>Band: {{$belongsToBand->name}}</h4>
        <br><br>
        <form method="POST" action="{{ action('AlbumController@create') }}" role="form">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="band-id">Select Band</label>
                <select class="form-control" id="band-id" name="band-id" required>
                    @foreach ($bands as $band)
                        @if($band->id == $belongsToBand->id)
                            <option value={{$band->id}} selected>{{$band->name}}</option>
                        @else
                            <option value={{$band->id}}>{{$band->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="album-name">Album Name</label>
                <input class="form-control" id="album-name" name="album-name" placeholder="Enter Band Name" value="{{$album->name}}" required>
            </div>
            <div class="form-group">
                <label for="recorded-date">Recorded Date</label>
                <input class="form-control" id="recorded-date" name="recorded-date" placeholder="Enter Recorded Date" value={{$album->recorded_date}}>
            </div>
            <div class="form-group">
                <label for="release-date">Release Date</label>
                <input class="form-control" id="release-date" name="release-date" placeholder="Enter Release Date" value={{$album->release_date}}>
            </div>
            <div class="form-group">
                <label for="number-of-tracks">Number of Tracks</label>
                <input type="number" class="form-control" id="number-of-tracks" name="number-of-tracks" placeholder="Enter Number of Tracks" value={{$album->number_of_tracks}}>
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input class="form-control" id="label" name="label" placeholder="Enter Label" value="{{$album->label}}">
            </div>
            <div class="form-group">
                <label for="producer">Producer</label>
                <input class="form-control" id="producer" name="producer" placeholder="Enter Producer"  value="{{$album->producer}}">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input class="form-control" id="genre" name="genre" placeholder="Enter Genre" value="{{$album->genre}}">
            </div>
            <br><br>
            <input type="hidden" name="albumId" value="{{$album->id}}" />
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection