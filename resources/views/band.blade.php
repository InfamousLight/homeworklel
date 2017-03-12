@extends('app')
@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/BandList.js') }}></script>
@stop
@section('content')
    <div class="container">
        <div>
            <h1>Bands</h1>
            <a href="{{ url('/band/create-band/') }}"><button type="button" class="btn btn-success">Create Band</button></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        @if ($column == 'id' && $sort == 'asc')
                            <a href="{{ url('/band', ['column'=>'id', 'sort'=>'desc'] ) }}">#</a>
                        @else
                            <a href="{{ url('/band', ['column'=>'id', 'sort'=>'asc'] ) }}">#</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'name' && $sort == 'asc')
                            <a href="{{ url('/band', ['column'=>'name', 'sort'=>'desc'] ) }}">Band Name</a>
                        @else
                            <a href="{{ url('/band', ['column'=>'name', 'sort'=>'asc'] ) }}">Band Name</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'website' && $sort == 'asc')
                            <a href="{{ url('/band', ['column'=>'website', 'sort'=>'desc'] ) }}">Website</a>
                        @else
                            <a href="{{ url('/band', ['column'=>'website', 'sort'=>'asc'] ) }}">Website</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'start_date' && $sort == 'asc')
                            <a href="{{ url('/band', ['column'=>'start_date', 'sort'=>'desc'] ) }}">Start Date</a>
                        @else
                        <a href="{{ url('/band', ['column'=>'start_date', 'sort'=>'asc'] ) }}">Start Date</a>
                        @endif
                    </th>
                    <th>
                        @if ($column == 'still_active' && $sort == 'asc')
                            <a href="{{ url('/band', ['column'=>'still_active', 'sort'=>'desc'] ) }}">Active</a>
                        @else
                        <a href="{{ url('/band', ['column'=>'still_active', 'sort'=>'asc'] ) }}">Active</a>
                        @endif
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
                        <a href="{{ url('/band/edit-band/' . $band->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button id="{{$band->id}}" type="button" class="delete btn btn-danger delete-band">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection