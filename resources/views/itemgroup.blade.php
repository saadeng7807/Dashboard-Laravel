@extends('layouts.app')

@section('content')

<div class="container">


  <div class="card">
    <div class="card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-4">
                <form action="{{route('save')}}" method="post">
                    @csrf
                    <label for="Itemgroupsname" class="p-2">ادخل اسم المجموعة</label>
                    <input type="text" class="form-control form-control-sm " name="Itemgroupsname" id="Itemgroupsname">
                    <div class="row">
    
                    <div class="text-center">
                    <button class="btn btn-primary mt-2" type="submit" onclick="showmessage()">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <div class="card mt-3">
    <div class="card-body">
       <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>رقم المجموعة</th>
                <th>اسم  المجموعة</th>
                <th colspan="2">أجراء</tr>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $row)
              
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->Itemgroupsname}}</td>
                <td><a href="{{ route('del',['x'=>$row->id])}}"><i class="fa-solid fa-trash text-danger"></i></a> </td>
                <td><a href="{{route('edit',['x'=>$row->id])}}"><i class="fa-regular fa-pen-to-square text-success"></i></a></td>
            </tr>

            @endforeach
       </table>
    </div>
  </div>


</div>



<script >
    function showmessage()
    {
        Swal.fire({
  position: "top-end",
  icon: "success",
  title: "تم الحفظ بنجاح",
  showConfirmButton: false,
  timer: 1500
});

    }
    
</script>


@endsection