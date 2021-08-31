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
<form action="{{ route('admin.add') }}" method="GET">
    @csrf
   <center> <button type="submit" class="btn btn-success"  >Ajouter une formation</button></center>
</form>
<br />

<div id="accordion" class="mx-auto" style="width: 1000px;">
    @foreach($formations as $formation)
            <div class="card">
              <div class="card-header">
                <h4 class="mb-0">
                  
                 <form action="{{ route('admin.formation') }}" method="GET">
                    @csrf
                    <input type="hidden" name="id" value="{{$formation['id']}}"/>
                    <button class="btn  btn-outline-sucess my-2 my-sm-0" type="submit"><strong><h4> {{$formation['nom']}}</h4></strong></button>
                </form>
                </h4>
                <p>{{$formation['type']}}</p>
                  <div class="d-flex justify-content-end">
                  {{date('Y-m-d', strtotime($formation['failed_at']));}} </div> 
                
                  </div>
            </div>

    @endforeach
    </div>
@endsection
