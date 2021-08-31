<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Format;
use Illuminate\Support\Facades\Auth;
use App\Models\Beneficiaire;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function search(Request $request){

        $key = trim($request->get('q'));

        $posts = Format::query()
            ->where('nom', 'like', "%{$key}%")
            ->orWhere('type', 'like', "%{$key}%")
            ->orderBy('failed_at', 'desc')
            ->get();

        return view('search', [
            'key' => $key,
            'formations'=>$posts
        ]);
    }

    public function showformations(){
        
        $data=Format::all();
        return view('home',['formations'=>$data]);
    }
    public function showformations2(Request $request){
        
        
        $id=$request->id;
        $data=Format::query()
        ->where('id', '=', $id)
        ->get();
        return view('formation',['formations'=>$data]); 
    }
    public static function check_insc($id){
        $fid=$id;
        $uid=Auth::user()->id;
        $query=Beneficiaire::select('id','uid','fid')
               ->where([
                   ['uid','=',$uid],
                   ['fid','=',$fid]
               ])
               ->get();
        if(count($query)==0){
            return 0;
        }
        else{
            return 1;
        }
    }
    public function inscrire(Request $request){
        $fid=$request->id;
        $uid=Auth::user()->id;
        Beneficiaire::insert([
            'fid'=> $fid,
            'uid' => $uid
        ]);
        return redirect()->back();
    }
    public function desinscrire(Request $request){
        $fid=$request->id;
        $uid=Auth::user()->id;
        DB::delete('delete from beneficiaires where uid = ? and fid =?', [$uid,$fid]);
        return redirect()->back();

    }
    public function profil(){
        return view('profil');
    }
    public function formations(){
        $uid=Auth::user()->id;
        $fid=Beneficiaire::select('fid')
        ->where(
            'uid','=',$uid)
        ->get();
        $data=[];
        foreach($fid as $id){
            array_push($data,Format::query()
            ->where(
                [['id','=',$id['fid']]]
            )
            ->get());
        }
        return view('formations',['formations'=>$data]);

    }
}
