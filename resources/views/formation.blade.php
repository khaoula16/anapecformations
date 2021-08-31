@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
            <div class="card" style="background:teal" >
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <center>
                    <h3> {{ __("Bienvenue dans la platforme de gestion de formation de l'ANAPEC") }}</h3>
                    <h2>{{ ("Programme des formations")}}</h2>
                   </center>
                    </div>
                </div>
            </div>
    </div>
</div>
<br />
<center><a href={{ route('home') }}>Home</a></center>
<br />
<div id="accordion" class="mx-auto" style="width: 700px;">
    @foreach($formations as $formation)
            <div class="card">
              <div class="card-header">
                <h4 class="mb-0">
                  
                 <strong> {{$formation['nom']}}</strong>
                </h4>
                <p>{{$formation['type']}}</p>
                  <div class="d-flex justify-content-end">
                  {{date('Y-m-d', strtotime($formation['failed_at']));}} </div> 
                  <div  class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong> Lieu de formation : </strong>{{$formation['lieu']}}</li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><strong> Langage du formation : </strong>{{$formation['langue']}}</li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><strong> Description : </strong>{{$formation['description']}}</li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><strong> Durée : </strong>{{$formation['duree']}}</li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><strong> Objectifs du formation: </strong> {{$formation['objectifs']}}</li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><strong> Pré-requis : </strong>{{$formation['prerequis']}}</li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><strong> Début des cours : </strong>{{$formation['debut']}}</li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><strong> Diplôme: </strong>{{$formation['diplome']}}</li>
        </ul>
        <div class="d-flex justify-content-end">
            @if(App\Http\Controllers\HomeController::check_insc($formation['id'])==0)
            <form action="{{ route('home.inscrire') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$formation['id']}}"/>
                <div class="d-flex justify-content-end"> 
                <button type="submit" class="btn btn-success"  >S'inscrire</button>
                </div>
            </form>
            @endif
            @if(App\Http\Controllers\HomeController::check_insc($formation['id'])==1)
            <div class="d-flex justify-content-end">
                <span class="btn btn-success">✓inscrit</span>
                <form action="{{ route('home.desinscrire') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$formation['id']}}"/>
                    <div class="d-flex justify-content-end"> 
                    <button type="submit" class="btn btn-danger"  >Désinscrire</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
  </div>
</div>
</div>
</div>

@endforeach
</div>
@endsection