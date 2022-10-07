@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">
          <h3 class="fs-5 fw-bold text-left align-middle mt-3">Halaman Input Lowongan
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
              <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">Lowongan Pekerjaan
                  {{-- <hr class="diveader"> --}}
              </h3>
              <div class="card-body">
                  <form action="{{ route('admin.createlowongan.store') }}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="form-group row mb-2">
                        <label for="nama_pt" class="col-sm-3 col-form-label">NAMA PT</label>
                        <div class="col-sm-9">
                            <input type="text"
                                        class="form-control @error('nama_pt') is-invalid @enderror" name="nama_pt" id="nama_pt" placeholder="Masukkan Nama PT " value="{{ old('nama_pt') }}">
                                    {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                        @error('nama_pt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                      </div>    
                      <div class="form-group row mb-2">
                        <label for="lokasi" class="col-sm-3 col-form-label">LOKASI</label>
                        <div class="col-sm-9">
                            <input type="text"
                                        class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi " value="{{ old('lokasi') }}">
                                    {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                        @error('lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                    </div>
                      <div class="form-group row mb-2">
                          <label for="minimal_jenjang" class="col-sm-3 col-form-label">MINIMAL JENJANG</label>
                          <div class="col-sm-9">
                              <select name="minimal_jenjang" class="form-select" required>
                                  <option value="">PILIH JENJANG</option>
                                  <option value="SD">SD</option>
                                  <option value="SMP">SMP</option>
                                  <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                  <option value="D3">D3</option>
                                  <option value="D4 / S1">D4 / S1</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                        <label for="kategori" class="col-sm-3 col-form-label">KATEGORI</label>
                        <div class="col-sm-9">
                            <select name="kategori" class="form-select" required>
                                <option value="">PILIH KATEGORI</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Mobile Developer IOS/Android">Mobile Developer IOS/Android</option>
                                <option value="Junior Web Developer">Junior Web Developer</option>
                                <option value="Senior Web Developer">Senior Web Developer</option>
                            </select>
                        </div>
                    </div>
                      <div class="form-group row mb-2">
                          <label for="js_kelamin" class="col-sm-3 col-form-label">JENIS KELAMIN</label>
                          <div class="col-sm-9">
                              <select name="js_kelamin" class="form-select" required>
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                  <option value="Laki-Laki / Perempuan">Laki-Laki / Perempuan</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <label for="mask_usia" class="col-sm-3 col-form-label">MAKSIMAL USIA</label>
                          <div class="col-sm-9">
                            <input type="text"
                            class="form-control @error('mask_usia') is-invalid @enderror" name="mask_usia" id="mask_usia" placeholder="Masukkan Maksimal Usia " value="{{ old('mask_usia') }}">
                        {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                            @error('mask_usia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                        <label for="keahlian" class="col-sm-3 col-form-label">KEAHLIAN YANG DIBUTUHKAN</label>
                        <div class="col-sm-9">
                            <input type="text"
                                        class="form-control @error('keahlian') is-invalid @enderror" name="keahlian" id="keahlian" placeholder="Masukkan Keahlian " value="{{ old('keahlian') }}">
                                    {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                        @error('keahlian')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                      </div>
                      <div class="form-group row mb-2">
                        <label for="pengalaman" class="col-sm-3 col-form-label">PENGALAMAN</label>
                        <div class="col-sm-9">
                            <input type="text"
                                        class="form-control @error('pengalaman') is-invalid @enderror" name="pengalaman" id="pengalaman" placeholder="Masukkan Pengalaman " value="{{ old('pengalaman') }}">
                                    {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                        @error('pengalaman')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                      </div>
                      {{-- <div class="form-group row mb-2">
                          <label for="kota" class="col-sm-3 col-form-label">KOTA</label>
                          <div class="col-sm-9">
                              <select name="kota" class="form-select" id="kota" required>
                                  <option></option>

                              </select>
                          </div>
                      </div> --}}
                      <div class="form-group row mb-2">
                          <label for="desk_pekerjaan" class="col-sm-3 col-form-label">DESKRIPSI PEKERJAAN</label>
                          <div class="col-sm-9">
                              <textarea class="form-control" id="editor"
                              placeholder="DESKRIPSI PEKERJAAN" name="desk_pekerjaan" required autofocus> </textarea> 
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <label for="hari_kerja" class="col-sm-3 col-form-label">HARI KERJA</label>
                          <div class="col-sm-9">
                            <input type="text"
                            class="form-control @error('hari_kerja') is-invalid @enderror" name="hari_kerja" id="hari_kerja" placeholder="Masukkan Hari Kerja " value="{{ old('hari_kerja') }}">
                        {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                            @error('hari_kerja')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <label for="jam_kerja" class="col-sm-3 col-form-label">JAM KERJA</label>
                          <div class="col-sm-9">
                            <input type="text"
                            class="form-control @error('jam_kerja') is-invalid @enderror" name="jam_kerja" id="jam_kerja" placeholder="Masukkan Jam Kerja " value="{{ old('jam_kerja') }}">
                        {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                            @error('jam_kerja')
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
{{-- <script type="text/javascript">
  $(document).ready(function() {
      $('#kota').select2({
          placeholder: 'PILIH KOTA',
          theme: 'bootstrap-5',
          dropdownCssClass: '#kota',
          allowClear: true
      });
  });
</script>
<script>
  $(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  });
</script> --}}

<script>
    var editor = new Simditor({
  textarea: $('#editor')
  //optional options
});
</script>
@endsection