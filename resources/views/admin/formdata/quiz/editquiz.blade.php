@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">
          <h3 class="fs-5 fw-bold text-left align-middle mt-3">Halaman Edit Quiz
              <hr class="diveader">
          </h3>

          <!-- Notifikasi menggunakan flash session data -->
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif

          @if (session('error'))
              <div class="alert alert-error alert-dismissible fade show">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif

          <div class="col-md-12 " >
              <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">Quiz
                  {{-- <hr class="diveader"> --}}
              </h3>
              <div class="card-body">
                
                  <form action="{{ route ('admin.listquiz.update', $quiz->id) }}" method="post">

                      @csrf
                      @method('PUT')
                      
                       <div class="form-group row mb-2">
                        <label for="judul" class="col-sm-3 col-form-label">JUDUL</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control phone" name="judul" id="judul"
                            value="{{ $quiz->judul }}" required>
                        </div>
                      </div>
                      
                      <div class="form-group row mb-2">
                        <label for="desk_pekerjaan" class="col-sm-3 col-form-label">DESKRIPSI PEKERJAAN</label>
                        <div class="col-sm-9">
                            <textarea id="desk" class="form-control" 
                            placeholder="DESKRIPSI PEKERJAAN" name="desk_pekerjaan" required autofocus>{{ $quiz->desk_pekerjaan }}</textarea> 
                        </div>
                    </div>
                        <button type="submit" class="btn btn-md show-alert-save-box" style="background-color: #fe5900; color:white">Save</button>
                        <a href="{{ route('home') }}" class="btn btn-md btn-secondary">back</a>
                  </form>
                  <div class="mt-2">
                      <hr class="diveader ">
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="simditor/styles/simditor.css"/>
    


<script>
  var desk = new Simditor({
textarea: $('#desk')
//optional options
});
</script>

<script>
  $('.show-alert-save-box').click(function(event){
     
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         
 Swal.fire({
title: 'Do you want to save the changes?',
showDenyButton: true,
showCancelButton: true,
confirmButtonText: 'Save',
denyButtonText: "Don't save",
}).then((result) => {
/* Read more about isConfirmed, isDenied below */
if (result.isConfirmed) {
 Swal.fire('Saved!', '', 'success')
 form.submit()
} else if (result.isDenied) {
 Swal.fire('Changes are not saved', '', 'info')
}
})
});
</script>

@endsection