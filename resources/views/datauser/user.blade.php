@extends('layouts.header')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#exampleModal"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
</div>
@if ($message = Session::get('Status'))
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
<strong>{{$message}}</strong>
</div>
@endif
@if ($message = Session::get('edit'))
<div class="alert alert-warning" role="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
<strong>{{$message}}</strong>
</div>
@endif
@if ($message = Session::get('hapus'))
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
<strong>{{$message}}</strong>
</div>
@endif
<table class="table table-bordered">
    <thead class="table-dark" align="center">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama User</th>
            <th scope="col">Email</th>
            {{-- <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th> --}}
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach ($user as $us )
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $us->name}}</td>
            <td>{{ $us->email }}</td>
            {{-- <td>{{ $us->created_at }}</td>
            <td>{{ $us->updated_at}}</td> --}}
            <td>
                @if ($us->id_user != Auth::user()->id_user)
                <a href="/hapus/user/{{$us->id_user}}" class="btn btn-danger btn-circle" title="Hapus Data"
                onclick="return confirm('Yakin Ingin Menghapus Data?')"><span class="fas fa-trash"></a>
                @endif
                <a href="" class="btn btn-primary btn-circle"  data-toggle="modal"
                data-target="#edit{{$no}}"><span class="fas fa-edit"></a>
            </td>
        </tr>
        <div class="modal fade" id="edit{{$no}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/edit/user">
                            @csrf

                            <input type="hidden" id="id_user" name="id_user" value="{{$us->id_user}}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        
                                <div class="col-md-6">
                                <input id="name" type="text" value="{{$us->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                <div class="col-md-6">
                                <input id="email" type="email" value="{{$us->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/insert/user">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div> --}}

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
{{-- end modal tambah --}}
@endsection
