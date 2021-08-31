@extends('layouts.app')
@section('content')

<center><a href={{ route('admin.dashboard') }}>Home Admin </a></center>
<br />
<center>
    @if($errors->first()=="sucess")
            <div class="alert alert-success" style="width: 350px;">
                    
                        {{ "La formation est bien modifié !" }} 
                    
            </div>
    @endif
    </center>
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
        <form action="{{ route('admin.benef') }}" method="GET">
            @csrf
            <input type="hidden" name="id" value="{{$formation['id']}}"/>
            <button type="submit" class="btn btn-primary"  >Bénéficiaires</button>
        </form>
        <form action="{{ route('admin.edit.form') }}" method="GET">
            @csrf
            <input type="hidden" name="id" value="{{$formation['id']}}"/>
            <button type="submit" class="btn btn-success"  >Modifier</button>
        </form>
        <form action="{{ route('admin.delete') }}" method="GET">
            @csrf
            <input type="hidden" name="id" value="{{$formation['id']}}"/>
            <button type="submit" class="btn btn-danger"  >Supprimer</button>
          </form>
        </div>
    </div>
  </div>
</div>
</div>
</div>

@endforeach
</div>
@endsection