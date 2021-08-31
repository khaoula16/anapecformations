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
<aside class="col-md-4 blog-sidebar" style="width: 300px;">
    @include ('layouts.aside')
</aside>
<br />
<center>
  <div id="accordion" class="mx-auto" style="width: 700px;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">       
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link " href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.profil') }}">Mon profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" >Mes formations<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{route('home.search')}}" method="GET">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"  name="q">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
 
  </div>
</center>
@foreach($formations as $formation)
@php
  $formation=$formation->first();  
@endphp
<br />
  <div id="accordion" class="mx-auto" style="width: 700px;">
        <div class="card">
          <div class="card-header" style="background:#89b3ae">
            <h4 class="mb-0">
              
              <form action="{{ route('home.formation') }}" method="GET">
                @csrf
                <input type="hidden" name="id" value="{{$formation['id']}}"/>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><strong> {{$formation['nom']}}</strong></button>
            </form>
            </h4>
            <p><i>{{$formation['type']}}</i></p>
              <div class="d-flex justify-content-end">
              {{date('Y-m-d', strtotime($formation['failed_at']));}} </div> 
              @if(App\Http\Controllers\HomeController::check_insc($formation['id'])==1)
                <div class="d-flex justify-content-end">
                   <h6> <span class="badge badge-secondary">✓inscrit</span></h6>
                </div>
                @endif
          </div>
      
          
          
        </div>
        <br />
        @endforeach
</div>
@endsection