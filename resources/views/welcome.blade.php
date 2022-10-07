@extends('layouts.navbar1')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@elseif (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
<div class="container-fluid">
    <div class="row gap-5 justify-content-center" style="margin-top: 28px;margin-bottom: 30px;">
        <div class="col-12 col-lg-6 text-center text-lg-start align-self-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators" >
                  <button type="button" style="background-color: #fe5900" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" style="background-color: #fe5900" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" style="background-color: #fe5900" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="asset/img/wlcome.png" class="d-block w-100" style="width: 75%" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="asset/img/PROJEC~1.png" class="d-block w-100" style="width: 75%" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="asset/img/logomascitra.png" class="d-block w-100" style="width: 75%" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" >
                  <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #fe5900"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" >
                  <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #fe5900"></span>
                  <span class="visually-hidden" >Next</span>
                </button>
            </div>
        </div>
        <div class="col-12 col-lg-5 align-self-center text-center text-lg-start " >
            <h1>E-Recruitment</h1>
            <h1>Aplikasi Kegiatan Recruitment Karyawan & Peserta Magang/Praktek</h1>
            <p>Memanagement peserta recruitment melalui aplikasi untuk <br>memudahkan dalam proses administrasi<br></p>
        </div>
    </div>
    <div >
        <footer class="text-center mt-2" style="font-size: 0.8em;">
            Jika Ada Pertanyaan Silahkan Email Ke <a href="mailto:info@mis-i.mascitra.co.id">info@mis-i.mascitra.co.id</a>
            <p>Copyright © 2022 - All right reserved by PT Mascitra Teknologi Informasi<br></p>
        </footer>
    </div>
</div>
@endsection
