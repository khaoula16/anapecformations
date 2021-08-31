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
    @if($formations->isNotEmpty())
    @foreach($formations as $formation)
    
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
    @else 
    <div>
       <center> <h2>Aucun formation n'est trouvée !</h2></center>
    </div>
@endif
@endsection