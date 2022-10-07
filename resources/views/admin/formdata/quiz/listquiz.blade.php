@extends('admin.layouts.appadmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px;">
                <h3 class="mt-2">Halaman Daftar Quiz</h3>
                <hr>

                <h1 class="card-header" style="border-radius: 10px;">Hai! {{ Auth::user()->name }}  </h1>

                {{-- <div class="card">
                    <div class="card-header">
                    <button wire:click="tambah" class="btn btn-sm btn-primary">Tambah</button>
                </div> --}}

                @if (Auth::user()->level == 'admin')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center align-middle">JUDUL</th>
                                    <th scope="col" class="text-center align-middle">DESKRIPSI PEKERJAAN</th>
                                    <th scope="col" class="text-center align-middle">#</th>
                                    <th scope="col" class="text-center align-middle">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($quiz as $q)
                               
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ $q->judul }}</td>
                                        <td class="text-center align-middle">{{ $q->desk_pekerjaan }}
                                        </td>
                                        <td class="text-center">
                                                <form method="POST" action="{{ route('dropquiz.destroy', $q->id) }}">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                
                                                <button type="submit"  class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete' style="
                                                color: #fff;
                                                background-color: #dc3545;
                                                border-color: #dc3545;
                                            ">Delete</button>
                                            </form>
                                            <a href="/edit-quiz/{{ $q->id}}" style="
                                                color: #000;
                                                background-color: #ffc107;
                                                border-color: #ffc107;
                                            " class="btn btn-sm btn-warning mb-1 mt-1" >Edit</a>

                                            <a href="/create-soal" style="
                                                color: #000;
                                                background-color: #076aff;
                                                border-color: #076aff;
                                            " class="btn btn-sm btn-warning mb-1 mt-1" >Tambah</a>

                                        </td>
                                        <td class="text-center align-middle">
                                            <input data-id="{{$q->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $q->status ? 'checked' : '' }}>
                                         </td>
                                    </tr>
                                    
                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data Quiz
                                            tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


   
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => { 
if (result.isConfirmed) {
form.submit();
Swal.fire(     
  'Deleted!',
  'Your file has been deleted.',
  'success'
) 
} 
})
    }); </script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'id': id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection


{{-- color: #fff;
    background-color: #dc3545;
    border-color: #dc3545; 
    
    color: #000;
    background-color: #ffc107;
    border-color: #ffc107;--}}
