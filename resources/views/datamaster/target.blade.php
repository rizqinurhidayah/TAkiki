@extends('layouts.header')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Target</h1>
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
            <th scope="col">Nama Surah</th>
            <th scope="col">Ayat</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach ($target as $tar)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{$tar->surah['nama_surah']}}</td>
            <td>{{$tar->ayat}}</td>
            <td>{{$tar->created_at}}</td>
            <td>{{$tar->updated_at}}</td>
            <td>
                <a href="/hapus/target/{{$tar->id_target}}" class="btn btn-danger btn-circle" title="Hapus Data"
                    onclick="return confirm('Yakin Ingin Menghapus Data?')"><span class="fas fa-trash"></a>
                <a href="" class="btn btn-primary btn-circle"  data-toggle="modal"
                data-target="#edit{{$no}}"><span class="fas fa-edit"></a>
            </td>
        </tr>
        <div class="modal fade" id="edit{{$no}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form method="POST" action="/edit/target">
                            @csrf

                        <input type="hidden" id="id_target" name="id_target" value="{{$tar->id_target}}">
                            <div class="form-group row">
                                <label for="surah"
                                    class="col-md-4 col-form-label text-md-right">{{ __('NAMA SURAH') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                                    <select id="surah" type="text"
                                        class="form-control @error('surah') is-invalid @enderror" name="surah" required
                                        autocomplete="current-surah">
                                        <option selected>{{$tar->surah['nama_surah']}}</option>
                                        @foreach ($surah as $sur)
                                        @if($tar->surah['nama_surah']!=$sur->nama_surah)
                                        <option value={{$sur->id_surah}}>{{$sur->nama_surah}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('surah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="ayat" class="col-md-4 col-form-label text-md-right">{{ __('AYAT') }}</label>

                                <div class="col-md-6">
                                    <input id="ayat" type="text"
                                        class="form-control @error('ayat') is-invalid @enderror" value="{{$tar->ayat}}" name="ayat" required
                                        autocomplete="current-ayat">

                                    @error('ayat')
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
                <form method="POST" action="/insert/target">
                    @csrf
                    <div class="form-group row">
                        <label for="surah" class="col-md-4 col-form-label text-md-right">{{ __('NAMA SURAH') }}</label>

                        <div class="col-md-6">
                            {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                            <select id="surah" type="text" class="form-control @error('surah') is-invalid @enderror"
                                name="surah" required autocomplete="current-surah">
                                <option selected>Pilihan...</option>
                                @foreach ($surah as $sur)
                                <option value={{$sur->id_surah}}>{{$sur->nama_surah}}</option>
                                @endforeach
                            </select>
                            @error('surah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="ayat" class="col-md-4 col-form-label text-md-right">{{ __('AYAT') }}</label>

                        <div class="col-md-6">
                            <input id="ayat" type="text" class="form-control @error('ayat') is-invalid @enderror"
                                name="ayat" required autocomplete="current-ayat">

                            @error('ayat')
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
{{-- end modal tambah --}}
@endsection
