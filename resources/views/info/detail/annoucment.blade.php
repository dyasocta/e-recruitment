@extends('layouts.app')
<style type="text/css">
.horn{
    width: 5%;
}
.card-img-top-mascit{
  width: 30%;
  margin: auto;
}
.card-body-annoucment{
  border-top: 2px solid rgb(204, 204, 204)
}
.judul-annoucment{
  margin-top: 1%;
  text-align: center;
  font-family: Franklin Gothic Medium;
  margin-bottom: 2%;
}
.tanggal-annoucment{
font-family: Garamond;
float: right;
margin-right: 1%;
}
.card-text{
  margin-left: 1%;
  margin-top: 4%;
  padding: 1%;
  font-family: Georgia;
}
</style>
@section('content')

<div class="card" style="width: 85%; margin: auto; filter: drop-shadow(0 0 0.75rem rgb(114, 114, 114));">
    <img src="/asset/img/logomascitra.png" class="card-img-top-mascit" alt="...">
    <div class="card-body-annoucment">
      <div class="judul-annoucment"><h4>{{ $annoucment->judul }}</h4></div><p class="tanggal-annoucment" >{{ $annoucment->created_at }}</p>
      <p class="card-text">{{ $annoucment->desk_pekerjaan }}</p>
    </div>
  </div>
@endsection