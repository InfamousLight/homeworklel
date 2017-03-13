@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/BandForm.js') }}></script>
@stop
@section('content')
    <div class="container">
        <h1>Create Band</h1><br><br>
        <form method="POST" action="{{ action('BandController@create') }}" role="form">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="band-name">Band Name</label>
                <input class="form-control" id="band-name" name="band-name" placeholder="Enter Band Name" required>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input class="form-control" id="website" name="website" placeholder="Enter Bands Website">
            </div>
            <div class="form-group">
                <label for="start-date">Start Date</label>
                <input class="form-control" id="start-date" name="start-date" placeholder="Enter Start Date">
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <input type="number" class="form-control" id="active" name="active" placeholder="Enter 1 or 0 for Active">
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection