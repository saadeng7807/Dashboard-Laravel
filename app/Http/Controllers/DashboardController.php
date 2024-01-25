<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemgroup;
use App\Models\Items;
use Illuminate\Support\Facades\DB; 
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('auth');

       
    }

   public function logout()
   {
      Auth::logout();
      return redirect('login');
   }
    public function del($x)
    {
      $item=Itemgroup::find($x);
      
      $item->delete();

      return redirect('itemgroup');
    }


    public function displayadditemsgroup()
    {
      $data=Itemgroup::All();
      
      return view('dashboard.addgroupsitem',['data'=>$data]);
    }

    public function DisplayItems()
    {
      $data=DB::table('itemgroups')
      ->join('items','itemgroups.id','=','items.itemgroupno')
      ->get();
      return view('dashboard.controlpanel',['data'=>$data]);
    }

    public function Update(Request $request)
    {

     
        $item=Itemgroup::find($request->id);
        
        $item->Itemgroupsname=$request->namegroup;

        $item->save();
      
        return redirect('itemgroup');
    }
    public function Edit($x)
    {
      $item=Itemgroup::where('id',$x)
      ->first();
      return view('editgroupitem',['item'=>$item]);
    
    }


    public function GetItemGroup()
    {
      $data=Itemgroup::All();
       $issave=true;
      return view('itemgroup',['data'=>$data,'issave'=>$issave]);
    }


    public function SaveGroupsItems(Request $request)
    {
      
      $data=Itemgroup::create([
        'Itemgroupsname'=>$request->Itemgroupsname
      ]);

      $data->save();
     
      return redirect('addgritem');

    }
}
