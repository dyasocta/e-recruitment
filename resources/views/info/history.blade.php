@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style type="text/css">
#bcard{
    width: 90%;
    margin: auto;
}
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    width: 98%;
}
.styled-table thead tr {
    background-color: #ff8b2c;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #ff8b2c;
}
.card-kepala{
    padding: 0.5rem 1rem;
    margin-bottom: 0;
    background-color: #fff599;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.foto-topi{
  width: 5%;
  border: 2px solid #ffffff;
  border-radius: 50%;
  float: left;
  margin-right: 1%;
}
.pendaftaran{
  margin-top: -1.2%;
  margin-bottom: -0.5%;
  font-family: Arial, Helvetica, sans-serif;
}
.text-history
{
margin-top: -0.5%;
font-family: Arial, Helvetica, sans-serif;
}
.lolos{
  margin-top: 3%;
              background-color: #11ff2e;
              border-radius: 4px;
              border-style: none;
              box-sizing: border-box;
              color: #ffffff;
              display: inline-block;
              font-family: Bookman;
              font-size: 14px;
              font-weight: 35;
              height: 30px;
              line-height: 9px;
              list-style: none;
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
}
.tolak{
  margin-top: 3%;
              background-color: #ff0303;
              border-radius: 4px;
              border-style: none;
              box-sizing: border-box;
              color: #00000;
              display: inline-block;
              font-family: Bookman;
              font-size: 14px;
              font-weight: 35;
              height: 30px;
              line-height: 10px;
              list-style: none;
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
}
.waiting{
  margin-top: 3%;
              background-color: #11c8ff;
              border-radius: 4px;
              border-style: none;
              box-sizing: border-box;
              color: #FFFFFF;
              display: inline-block;
              font-family: Bookman;
              font-size: 14px;
              font-weight: 35;
              height: 30px;
              line-height: 10px;
              list-style: none;
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
}
</style>
@section('content')
<div class="card" id="bcard">
    <div class="card-kepala">
      <div class="foto-graduation"><img src="/asset/img/graduation-cap.png" class="foto-topi"></div>
      <p class="texthistory"><h5><b>History</b></h5></p>
      <p class="pendaftaran"> pendaftaran terhitung dari yang terbaru</p>
    </div>
    <div class="card-body">
      <table class="styled-table">
        <thead>
            <tr> 
                <th>Rekutmen</th>
                <th>Lokasi</th>
                <th>Formasi</th>
                <th>Tgl.Apply</th>
                <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($history as $story)
           <tr>
            <td>{{ $story->rekutmen }}</td>
            <td>{{ $story->lokasi }}</td>
            <td>{{ $story->formasi }}</td>
            <td>{{ $story->tgl_apply }}</td>
            <td @if ( $story->status == 'WAITING')
              class="waiting"
              @elseif($story->status == 'LOLOS')
              class="lolos"
              @else
              class="tolak"
            @endif>{{ $story->status }}</td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>
  </div>
  

@endsection