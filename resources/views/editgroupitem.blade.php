@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row d-flex justify-content-center">
        <h1 class="alert alert-success">تعديل بيانات مجموعات الأصناف</h1>
        <div class="col">
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                    <form action="{{route('update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <label for="x1">اسم العنصر</label>
                        <input type="text" name="namegroup" id="x1" value="{{$item->Itemgroupsname}}">

                        <div class="text-center">
                          <button class="btn btn-primary mt-2" type="submit" >حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection