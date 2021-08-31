<?php

namespace App\Http\Controllers;
use App\Models\Beneficiaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use Illuminate\Http\Request;

class BenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin');
    }

    public function list(Request $request){
        $fid=$request->id;
        $data=DB::table('beneficiaires')
               ->join('users','users.id','beneficiaires.uid')
               ->join('formats','formats.id','beneficiaires.fid')
               ->select('beneficiaires.fid as fid' ,'beneficiaires.failed_at as failed_at','users.name as name','users.email as email','formats.nom as nom')
               ->where('beneficiaires.fid',$fid)
               ->get();
               $array = json_decode(json_encode($data), true);
               if(count($array)!=0){
                $fnom=$array[0]['nom'];
                return view('beneficiaire',['beneficiaires'=>$array,'fnom'=>$fnom]);
               }
               
        return view('beneficiaire',['beneficiaires'=>$array]);
        
        
        
    }
}
