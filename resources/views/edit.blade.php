@extends('layouts.app')

@section('content')
<center><a href={{ route('admin.dashboard') }}>Home Admin </a></center>
<div class="flex judtify-center">
    @foreach($formations as $formation)
    
    <form class="mx-auto" style="width: 350px;" action="{{ route('admin.edit') }}" method="POST">
      @csrf
      <h3><strong> Modifier la formation :</strong></h3>
      <input type="hidden" name="id" value="{{$formation['id']}}"/>
      <div class="form-group">
          <label for="nom">Nom du formation</label>
          <input type="text" class="form-control" id="nom" name="nom" value="{{$formation['nom']}}"/>
          <span style="color:red">@error('nom'){{ $message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="type">Type du formation</label>
        <input type="text" class="form-control" id="type" name="type" value="{{$formation['type']}}"/>
        <span style="color:red">@error('type'){{ $message}} @enderror</span>
    </div>
      <div class="form-group">
        <label for="lieu">Lieu de formation</label>
        <input type="text" class="form-control" id="lieu" name="lieu" value="{{$formation['lieu']}}"/>
        <span style="color:red">@error('lieu'){{ $message}} @enderror</span>
    </div>
    <div class="form-group">
      <label for="langue">Langage du formation</label>
      <input type="text" class="form-control" id="langue" name="langue" value="{{$formation['langue']}}"/>
      <span style="color:red">@error('langue'){{ $message}} @enderror</span>
  </div>
  
      <div class="form-group">
        <label for="duree">Durée</label>
        <input type="text" class="form-control" id="duree" name="duree" value="{{$formation['duree']}}"/>
        <span style="color:red">@error('duree'){{ $message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="desc">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{$formation['description']}}</textarea>
        <span style="color:red">@error('description'){{ $message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="objectifs">Objectifs</label>
        <textarea class="form-control" id="objectifs" name="objectifs" rows="4">{{$formation['objectifs']}}</textarea>
        <span style="color:red">@error('objectifs'){{ $message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="prerequis">Pré-requis</label>
        <textarea class="form-control" id="prerequis" name="prerequis" rows="4">{{$formation['prerequis']}}</textarea>
        <span style="color:red">@error('prerequis'){{ $message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="debut">Début des cours</label>
        <input type="date" class="form-control" id="debut" name="debut" value="{{$formation['debut']}}"/>
        <span style="color:red">@error('debut'){{ $message}} @enderror</span>
    </div>
    <div class="form-group">
      <label for="diplome">Diplôme</label>
      <input type="text" class="form-control" id="diplome" name="diplome" value="{{$formation['diplome']}}"/>
      <span style="color:red">@error('diplome'){{ $message}} @enderror</span>
  </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
@endsection