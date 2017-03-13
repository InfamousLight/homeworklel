@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Band - {{$band->name}}</h1><br><br>
        <form method="POST" action="{{ action('BandController@edit') }}" role="form">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="band-name">Band Name</label>
                <input class="form-control" id="band-name" name="band-name" placeholder="Enter Band Name" value="{{$band->name}}">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input class="form-control" id="website" name="website" placeholder="Enter Bands Website" value={{$band->website}}>
            </div>
            <div class="form-group">
                <label for="start-date">Start Date</label>
                <input class="form-control" id="start-date" name="start-date" placeholder="Enter Start Date" value={{$band->start_date}}>
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <input class="form-control" id="active" name="active" placeholder="Enter 1 or 0 for Active" value={{$band->still_active}}>
            </div>
            <br><br>
            <input type="hidden" name="bandId" value="{{$band->id}}" />
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection