<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Format;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }
    public function showformations(){
        
        $data=Format::all();
        return view('admin',['formations'=>$data]);
    }
    public function showformations2(Request $request){
        $id=$request->id;
        $data=Format::query()
        ->where('id', '=', $id)
        ->get();
        return view('formationadmin',['formations'=>$data]); 
        
    }
    public function addform(){
        return view('add');
    }
    public function store(Request $request){

        $request->validate([
            'nom'=>'required|max:200',
            'duree' => 'required',
            'description' => 'required',
            'objectifs' =>'required',
            'prerequis' =>'required',
            'lieu' =>'required',
            'type' =>'required',
            'langue' =>'required',
            'debut' =>'required',
            'diplome' =>'required'

        ]);
        
        $query= Format::insert([
            'nom'=> $request ->input('nom'),
            'duree' => $request->input('duree'),
            'description' =>$request->input('description'),
            'objectifs' =>$request->input('objectifs'),
            'prerequis' =>$request->input('prerequis'),
            'lieu' =>$request->input('lieu'),
            'type' =>$request->input('type'),
            'langue' =>$request->input('langue'),
            'debut' =>$request->input('debut'),
            'diplome' =>$request->input('diplome')
        ]);
        
        if($query){
            return redirect()->back()->withErrors(['sucess','La formation est bien ajoutée']);

        }else{
            return redirect()->back()->withErrors(['fail',"Erreur dans l'ajout"]);
        }
    }
    public function editform(Request $request){
        $id=$request->id;
        $data=Format::select('id','nom', 'duree', 'description','objectifs','prerequis','lieu','type','langue','debut','diplome')
        ->where('id', '=', $id)
        ->get();
        return view('edit',['formations'=>$data]);   
    }
    public function edit(Request $request){
        $request->validate([
            'nom'=>'required|max:200',
            'duree' => 'required',
            'description' => 'required',
            'objectifs' =>'required',
            'prerequis' =>'required',
            'lieu' =>'required',
            'type' =>'required',
            'langue' =>'required',
            'debut' =>'required',
            'diplome' =>'required',
        ]);

        $id=$request->id;
        $nom=$request ->input('nom');
        $duree=$request->input('duree');
        $description=$request->input('description');
        $objectifs=$request->input('objectifs');
        $prerequis=$request->input('prerequis');
        $lieu =$request->input('lieu');
        $type =$request->input('type');
        $langue =$request->input('langue');
        $debut =$request->input('debut');
        $diplome =$request->input('diplome');
        DB::table('formats')->Where('id','=',$id)
                           ->update(['nom' =>$nom ,'duree'=>$duree,'description'=> $description,'objectifs'=>$objectifs,'prerequis'=>$prerequis
                           ,'lieu'=>$lieu,'type'=>$type,'langue'=>$langue,'debut'=>$debut,'diplome'=>$diplome]);
                           
        //return redirect()->back()->withErrors(['sucess','La formation est bien modifié']);
        return redirect()->intended(route('admin.formation'))->withErrors(['sucess','La formation est bien modifié']);
    }
    public function delete(Request $request){
        $id=$request->id;
        $data=Format::find($id);
        DB::delete('delete from formats where id = ?', [$id]);
        return redirect()->back();
    }

}
