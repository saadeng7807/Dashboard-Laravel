<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemgroup;
use App\Models\Items;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;


class ItemsController extends Controller
{
  
    

     public function ShowItemGroup()
     {
      $data=Itemgroup::All();
      $count=$data->count();
      
      return view('welcome',['data'=>$data,'count'=>$count]);

     }


     public function testapi()
     {
           //$response=Http::get('https://api.sampleapis.com/coffee/iced');
           //$data=$response->object();

           $apiurl="https://v1.baseball.api-sports.io/leagues";
           $header=[
               'content-type'=>'application-json',
               'X-RapidAPI-Key'=>'24c939c2ba293c859d5ecd476932d293'
           ];
           $respose=Http::withheaders($header)->get($apiurl);
           $data=$respose->json();
        //   dd($data);
           return view('cafe',['data'=> $data]);
     }
    public function Checkout()
    {
      $apiURL = 'https://v1.baseball.api-sports.io/status';
      $headers = [
        'Content-Type' => 'application/json',
        'X-RapidAPI-Key' => '24c939c2ba293c859d5ecd476932d293'
    ];
    $response = Http::withHeaders($headers)->get($apiURL);
    $data = $response->json();

    dd($data);
      return view('checkout');
    }
     public function AddtoCart($id)
     {
     
      DB::table('cart')->insert(['iditem' => $id]); //save to cart table 
      $idgroup=Session::get('id');
      $count=DB::table('cart')->get()->count();
      Session::put('countitem',$count);
      return redirect('showproduct/'. $idgroup );  //redirect to showproduct page blade 

     }

     public function Showproduct($id)
     {
      $data=Items::where('itemgroupno',$id)
      ->get();

     
        Session::put('id',$id);
      return view('showproduct',['data'=>$data]);
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
