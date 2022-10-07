@extends('admin.layouts.appadmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px;">
                <h3 class="mt-2">Halaman Dashboard</h3>
                <hr >

                <h1 class="card-header" style="border-radius: 10px;">Hai! {{ Auth::user()->name }}  </h1>

                @if (Auth::user()->level == 'admin')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center align-middle">LEVEL</th>
                                    <th scope="col" class="text-center align-middle">KUALIFIKASI</th>
                                    <th scope="col" class="text-center align-middle">NO. KTP</th>
                                    <th scope="col" class="text-center align-middle">NAMA</th>
                                    <th scope="col" class="text-center align-middle">TANGGAL LAHIR</th>
                                    <th scope="col" class="text-center align-middle">TEMPAT LAHIR</th>
                                    <th scope="col" class="text-center align-middle">JENIS KELAMIN</th>
                                    <th scope="col" class="text-center align-middle">NO. HP</th>
                                    <th scope="col" class="text-center align-middle">EMAIL</th>
                                    <th scope="col" class="text-center align-middle">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($users as $user)
                                @if ($user->level == 'user')
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ $user->level }}</td>
                                        <td class="text-center align-middle">{{ $user->kualifikasi }}
                                        </td>
                                        <td class="text-center align-middle">{{ $user->no_ktp }}</td>
                                        <td class="text-center align-middle">{{ $user->name }}</td>
                                        <td class="text-center align-middle">
                                            {{ $user->tanggal_lahir }}
                                        </td>
                                        <td class="text-center align-middle">{{ $user->tempat_lahir }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $user->jenis_kelamin }}
                                        </td>
                                        <td class="text-center align-middle">{{ $user->no_hp }}
                                        </td>
                                        <td class="text-center align-middle">{{ $user->email }}
                                        </td>
                                        <td class="text-center">
                                            
                                                <form method="POST" action="{{ route('dropuser.destroy', $user->id) }}">
                                                    @csrf
                                                    {{-- @method('DELETE') --}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
                                                </form>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data Biodata
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
@endsection
