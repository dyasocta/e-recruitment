@extends('layouts.app')
<style type="text/css">
#lowongan_body{
    border-bottom: 1px solid;
    font-family: Optima;
    font: bold;
}
.created_at{
    float: right;
    font-family: Garamond;
}
ul{
    list-style-type: none;
}
.button-1 {
    float: right;
  background-color: #ff9011;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Bookman;
  font-size: 16px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;
  margin-top: -4%;
  margin-right: 2%;
  outline: none;
  padding: 10px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-1:hover,
.button-1:focus {
  background-color: #ff9f31;
}
.card-img-top-mascit{
  width: 30%;
  margin: auto;
}
.judul-lowongan{
    font-family: Big Caslon;
    margin-left: 2%;
}
</style>
@section('content')
<div class="card" style="width: 80%; margin:auto; filter: drop-shadow(0 0 0.75rem rgb(114, 114, 114));">
    <img src="/asset/img/logomascitra.png" class="card-img-top-mascit" alt="...">
    <div class="card-body">
      <div class="card-title" id="lowongan_body"><h4><b>{{ $lowongan->kategori }} (Lokasi : {{ $lowongan->lokasi }})</h4></b><form action="{{ route('apply-user', $lowongan->id) }}" method="POST">
        @csrf
        @method('POST')
        <input type="text" value="{{ $lowongan->id }}" name="id_lowongan" hidden>
        <input type="text" value="{{ $lowongan->lokasi }}" name="lokasi" hidden>
        <input type="text" value="{{ $lowongan->nama_pt }}" name="nama_pt" hidden>
        <input type="text" value="{{ $lowongan->kategori }}" name="kategori" hidden>
        <button type="submit" class="button-1" ><b>Apply</b></button>
    </form></div><p class="created_at">{{ $lowongan->created_at }}</p>
      <div class="card-text"><h5 class="judul-lowongan"><b>{{ $lowongan->nama_pt }}</b></h5>
        <h6><b>Deskripsi Pekerjaan</b></h6>
        <p>{{ $lowongan->desk_pekerjaan }}</p>
         <ul> 
            <li> Dibutuhkan : {{ $lowongan->kategori }}</li>
            <li> Berlokasi : {{ $lowongan->lokasi }}</li>
            <li> Hari Kerja : {{ $lowongan->hari_kerja }} dengan Jam Kerja : {{ $lowongan->jam_kerja }}</li>
        </ul>
        <h6><b>Requirement</b></h6>
        <ul>
            <li> Minimal Jenjang : {{ $lowongan->minimal_jenjang }}</li>
            <li> Minimal Penggalaman : {{ $lowongan->pengalaman }}</li>
        </ul>
    </div>
    
    </div>
  </div>
@endsection

