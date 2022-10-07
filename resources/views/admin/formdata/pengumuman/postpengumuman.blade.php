@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">
          <h3 class="fs-5 fw-bold text-left align-middle mt-3">Halaman Input Pengumuman
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
              <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">Pengumuman
                  {{-- <hr class="diveader"> --}}
              </h3>
              <div class="card-body">
                  <form action="{{ route('admin.pengumuman.store') }}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="form-group row mb-2">
                        <label for="judul" class="col-sm-3 col-form-label">JUDUL</label>
                        <div class="col-sm-9">
                            <input type="text"
                                        class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Masukkan Judul " value="{{ old('judul') }}">
                                    {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                        @error('judul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                      </div>
                      <div class="form-group row mb-2">
                          <label for="desk_pekerjaan" class="col-sm-3 col-form-label">DESKRIPSI</label>
                          <div class="col-sm-9">
                            <textarea type="text"
                            class="form-control @error('desk_pekerjaan') is-invalid @enderror" name="desk_pekerjaan" id="editor" placeholder="Masukkan Deskripsi Pekerjaan " value="{{ old('desk_pekerjaan') }}"> </textarea>
                        {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}
    
                            @error('desk_pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      
                      
                      
                      <button type="submit" class="btn btn-md show-alert-save-box" style="background-color: #fe5900; color:white">SAVE</button>
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
<script>
    var editor = new Simditor({
  textarea: $('#editor')
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