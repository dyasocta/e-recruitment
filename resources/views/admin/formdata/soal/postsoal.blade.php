@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">
            <h3 class="fs-5 fw-bold text-left align-middle mt-3">Halaman Input Soal
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

            <div class="col-md-12 ">
                {{-- <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">Soal
                </h3> --}}
                <div class="card-body">
                    <form action="{{ route('admin.soal.store') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-2">
                            <label for="soal" class="col-sm-3 col-form-label">SOAL</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('soal') is-invalid @enderror" name="soal" id="editor" placeholder="" value="{{ old('soal') }}"> </textarea>
                                {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                @error('soal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="pil_a" class="col-sm-3 col-form-label">PILIHAN A</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('pil_a') is-invalid @enderror" name="pil_a" id="editor" placeholder="Masukkan Pilihan A " value="{{ old('pil_a') }}"> </textarea>
                                {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                @error('pil_a')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="pil_b" class="col-sm-3 col-form-label">PILIHAN B</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('pil_b') is-invalid @enderror" name="pil_b" id="editor" placeholder="Masukkan Pilihan B " value="{{ old('pil_b') }}"> </textarea>
                                {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                @error('pil_b')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="pil_c" class="col-sm-3 col-form-label">PILIHAN C</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('pil_c') is-invalid @enderror" name="pil_c" id="editor" placeholder="Masukkan Pilihan C " value="{{ old('pil_c') }}"> </textarea>
                                {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                @error('pil_c')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="pil_d" class="col-sm-3 col-form-label">PILIHAN D</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('pil_d') is-invalid @enderror" name="pil_d" id="editor" placeholder="Masukkan Pilihan D " value="{{ old('pil_d') }}"> </textarea>
                                {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                @error('pil_d')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="pil_e" class="col-sm-3 col-form-label">PILIHAN E</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control @error('pil_e') is-invalid @enderror" name="pil_e" id="editor" placeholder="Masukkan Pilihan E " value="{{ old('pil_e') }}"> </textarea>
                                {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                @error('pil_e')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="kunci" class="col-sm-3 col-form-label">JAWABAN</label>
                            <div class="col-sm-9">
                            <select class="form-control" id="kunci" name="kunci">
                                    <option {{old('kunci') ? '' : 'selected disabled'}}>Pilihan Jawaban</option>
                                    <option {{old('kunci') == 'pil_a' ? 'selected' : ''}} value="pil_a">Pilihan A</option>
                                    <option {{old('kunci') == 'pil_b' ? 'selected' : ''}} value="pil_b">Pilihan B</option>
                                    <option {{old('kunci') == 'pil_c' ? 'selected' : ''}} value="pil_c">Pilihan C</option>
                                    <option {{old('kunci') == 'pil_d' ? 'selected' : ''}} value="pil_d">Pilihan D</option>
                                    <option {{old('kunci') == 'pil_e' ? 'selected' : ''}} value="pil_e">Pilihan E</option>
                                </select>

                                @error('kunci')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-md show-alert-save-box" style="background-color: #fe5900; color:white">Save</button>
                        <a href="{{ route('home') }}" class="btn btn-md btn-secondary">Back</a>
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
    $(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
        });
    $('.show-alert-save-box').click(function(event) {

        var form = $(this).closest("form");
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