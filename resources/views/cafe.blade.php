@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
             <thead>
                <tr>
                    <th>name</th>
                    <th>type</th>
                    <th>country</th>
                    <th>logo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['response'] as $row)
                <tr>
                    <td>{{$row['name']}}</td>
                    <td>{{$row['type']}}</td>
                    <td>{{$row['country']['name']}}</td>
                    <td><img src="{{$row['logo']}}" width="100" height="100"></td>
                </tr>
                @endforeach
                </tbody>
             </div>
            </table>
        </div>
    </div>
</div>

@endsection