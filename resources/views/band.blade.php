@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/BandList.js') }}></script>
@stop
@section('content')
    <div class="container">
        <div class="band-list-header-container">
            <h1>Bands</h1>
            <div class="band-list-create-row">
                <a href="{{ url('/band/create-band/') }}"><button type="button" class="btn btn-success">Create Band</button></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        @if ($column == 'id' && $sort == 'asc')
                            <a href="{{ url('/?column=id&order=desc') }}">#</a>
                        @else
                            <a href="{{ url('/?column=id&order=asc') }}">#</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'name' && $sort == 'asc')
                            <a href="{{ url('/?column=name&order=desc') }}">Band Name</a>
                        @else
                            <a href="{{ url('/?column=name&order=asc') }}">Band Name</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'website' && $sort == 'asc')
                            <a href="{{ url('/?column=website&order=desc') }}">Website</a>
                        @else
                            <a href="{{ url('/?column=website&order=asc') }}">Website</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'start_date' && $sort == 'asc')
                            <a href="{{ url('/?column=start_date&order=desc') }}">Start Date</a>
                        @else
                            <a href="{{ url('/?column=start_date&order=asc') }}">Start Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'still_active' && $sort == 'asc')
                            <a href="{{ url('/?column=still_active&order=desc') }}">Active</a>
                        @else
                            <a href="{{ url('/?column=still_active&order=asc') }}">Active</a>
                        @endif
                    </th>
                    <th>
                        Albums
                    </th>
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
                        <ol>
                            @foreach($band->album as $album)
                                <li>{{$album->name}}</li>
                            @endforeach
                        </ol>
                    </td>
                    <td>
                        <a href="{{ url('/band/edit-band/' . $band->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button id="{{$band->id}}" type="button" class="delete btn btn-danger delete-band">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection