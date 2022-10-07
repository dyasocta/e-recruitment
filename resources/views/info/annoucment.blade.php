@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style type="text/css">
    .search-div{
        margin: 3%;
        width: 24%;
        background-color: white;
        border-radius: 4%;
        margin-top: -2px;
        position: absolute;
    }
.cari-btn{
    width: 90%;
    margin-bottom: 3%;
    margin-left: 5%;
}
#search{
    width: 90%;
    height: 32px;
    margin-left: 5%;
border-radius: 5px;
background-color: white;
border-color: rgb(226, 219, 219);
}
.card {
    width: 65%;
    float: right;
    margin: auto;
    margin-right: 3%;
    margin-top: -1.2%;
}
#fotosearch{
    margin: 2%;
}
#date{
    margin-top: -3.8%;
    margin-left: 78%;
    border-color: rgb(226, 219, 219);
    border-radius: 5%;
}
#a-z{
    width: 2%;
    margin-left: 98%;
    margin-top: -3%;
}
#z-a{
    width: 2%;
margin-left: 95%;
    margin-top: -3%;
}
.body-lowongan{
width: 98%;
margin: auto;
border: 2px solid;
border-color: rgb(226, 219, 219);
}
.lowongan-title{
    border-bottom: 1px solid;
    border-color: rgb(226, 219, 219);
    margin: auto;
}
.ahref{
    text-decoration: none;
    color: #000;
}
.title{
   margin-left: 2%;
   margin-top: 1%;
   font-family: Monaco;
}
.lowongan-footer{
    margin-left: 80%;
    margin-bottom: 0.5% 
}
.lowongan-desc{
    margin-left: 1%;
    margin-top: 0.5%;
}
.icon{
    width: 4%;
    float: left;
}
</style>
@section('content')
<form method="GET">
    <div class="mb-3 search-div w-32 border">
    
        <img src="/asset/img/search-interface-symbol.png" id="fotosearch">
        <div class="mb-3 border-bottom">
        </div>
    <div class="form-floating mb-3">
            <input type="text" value="{{ request()->get('search') }}" id="search" name="search" placeholder="Search" aria-label="Search" 
            aria-describedby="button-addon2">
      </div>
      <button type="submit" class="btn btn-warning cari-btn" id="button-addon2">Cari</button>
    </div>
    </form>
    


  <div class="card">
    <div class="card-header">
        <img src="/asset/img/bull-horn.png" class="icon">
        <h4 style="margin-top: 0.7%;">Pengumuman</h4>
        <input type="date" id='date' class="">
       <a href=""><img src="/asset/img/from-a-to-z.png" id="a-z"></a>
        <a href=""><img src="/asset/img/sort-alphabetically-down-from-z-to-a.png" id="z-a"></a>
    </div>
    @foreach ($annoucment as $item)
    <div class="card-body">
        <a href="{{ route('detail-annoucment', $item->id) }}" class="ahref">
        <div class="body-lowongan">
<div class="lowongan-title"><h5 class="title"><b>{{ $item->judul }}</b></h5></div>
<div class="lowongan-desc">{{ $item->desk_pekerjaan }}</div>
        </div>
    </a>
</div>
@endforeach
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
  </script>
  <script type="text/javascript">
      var route = "{{ url('search') }}";
      $('#search').typeahead({
          source: function (query, process) {
              return $.get(route, {
                  query: query
              }, function (data) {
                  return process(data);
              });
          }
      });
  </script>
@endsection