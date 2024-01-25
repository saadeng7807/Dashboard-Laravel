
@extends('layouts.app')


@section('content')

<div class="container">

   @foreach($data as $row)
    <div class="card mt-4">
        <div class="card-body">
            <div class="row ">
                <div class="col-sm-3">
                 <img src="/image/{{$row->image}}" width="150" height="150">
                </div>
                <div class="col-sm-9 text-start">
                 <h1 class="alert alert-info text-dark">{{$row->itemname}}</h1>
                 <h5>price : {{$row->price}}</h5>

                 <div class="row">
                    <div class="col text-center">
                      <a href="{{route('addtocart',['id'=>$row->id]) }}" class="btn btn-success">Add To Card</a>
                    </div>
                 </div>
                </div>
            </div>
        </div>
    </div>

   @endforeach
</div>


@endsection