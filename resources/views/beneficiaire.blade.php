@extends('layouts.app')

@section('content')
<center><a href={{ route('admin.dashboard') }}>Home Admin </a></center>
<br /><br/>
<div class="flex judtify-center">
    @if(count($beneficiaires)!=0)
   <center> <h3><strong> La liste des bénéficiaires de la {{$fnom}} :</strong></h3> </center>
   <br />
    <div id="accordion" class="mx-auto" style="width: 1000px;">   

    
    <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du bénéficiares</th>
            <th scope="col">Son email</th>
            <th scope="col">Inscrit le </th>
          </tr>
        </thead>
        <tbody>
            @foreach($beneficiaires as $i=>$beneficiaire)
          <tr>
            <td>{{ $i+1}}</td>
            <td>{{ $beneficiaire['name'] }}</td>
            <td>{{ $beneficiaire['email'] }}</td>
            <td>{{ $beneficiaire['failed_at'] }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    </div>
</div>
@endif
@if(count($beneficiaires)==0)
<center>
<h3><strong><i>Personne ni inscrit dans cette formation !<i></strong></h3>
</center>
@endif
@endsection