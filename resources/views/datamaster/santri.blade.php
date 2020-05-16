@extends('layouts.header')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Santri</h1>
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
            <th scope="col">NIDN</th>
            <th scope="col">Nama</th>
            <th scope="col">TTL</th>
            <th scope="col">JK</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kelas</th>
            <th scope="col">Status</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
      @php $no=1; @endphp
      @foreach ($santri as $sar)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{$sar->nidn_santri}}</td>
            <td>{{$sar->nama_santri}}</td>
            <td>{{$sar->tempat_lahir_santri}} {{$sar->tanggal_lahir_santri}}</td>
            <td>{{$sar->jenis_kelamin_santri}}</td>
            <td>{{$sar->alamat_santri}}</td>
            <td>{{$sar->kelas_santri}}</td>
            <td>{{$sar->status_santri}}</td>
            <td>{{$sar->created_at}}</td>
            <td>{{$sar->updated_at}}</td>
            <td>
              <a href="/hapus/santri/{{$sar->id_santri}}" class="btn btn-danger btn-circle" title="Hapus Data" onclick="return confirm('Yakin Ingin Menghapus Data?')"><span class="fas fa-trash"></a>
                <a href="" data-toggle="modal"
                data-target="#edit{{$no}}" class="btn btn-primary btn-circle"><span class="fas fa-edit"></a>
            </td>
        </tr>
        
{{-- modal edit --}}

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
            <form method="POST" action="/edit/santri">
                @csrf
                <input type="hidden" id="id_santri" name="id_santri" value="{{$sar->id_santri}}">
                {{-- inputan --}}
                <div class="form-group row">
                    <label for="nidn" class="col-md-4 col-form-label text-md-right">{{ __('NIDN SANTRI') }}</label>

                    <div class="col-md-6">
                        <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror"
                            name="nidn" value="{{ $sar->nidn_santri }}" required autocomplete="nidn" autofocus readonly>

                        @error('nidn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                {{-- akhir inputan --}}

                <div class="form-group row">
                    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('NAMA') }}</label>

                    <div class="col-md-6">
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{$sar->nama_santri}}" required autocomplete="current-nama">

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tempat_lahir"
                        class="col-md-4 col-form-label text-md-right">{{ __('TEMPAT LAHIR') }}</label>

                    <div class="col-md-6">
                        <input id="tempat_lahir" type="text"
                            class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                            value="{{$sar->tempat_lahir_santri}}"  required autocomplete="current-tempat_lahir">

                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal_lahir"
                        class="col-md-4 col-form-label text-md-right">{{ __('TANGGAL LAHIR') }}</label>

                    <div class="col-md-6">
                        <input id="tanggal_lahir" type="date"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"  value="{{$sar->tanggal_lahir_santri}}" name="tanggal_lahir"
                            required autocomplete="current-tanggal_lahir">

                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jk" class="col-md-4 col-form-label text-md-right">{{ __('JENIS KELAMIN') }}</label>

                    <div class="col-md-6">
                        {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                        <select id="jk" type="text" class="form-control @error('jk') is-invalid @enderror"
                            name="jk" required autocomplete="current-jk">
                            <option value="{{$sar->jenis_kelamin_santri}}" selected>
                                @if ($sar->jenis_kelamin_santri == "L") LAKI-LAKI  @else  PEREMPUAN @endif</option>
                            @if ($sar->jenis_kelamin_santri!="L")
                            <option value="L">LAKI-LAKI</option>
                            @else
                            <option value="P">PEREMPUAN</option>
                            @endif
                        </select>
                        @error('jk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('ALAMAT') }}</label>

                    <div class="col-md-6">
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat" value="{{$sar->alamat_santri}}" required autocomplete="current-alamat">

                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kelas" class="col-md-4 col-form-label text-md-right">{{ __('KELAS') }}</label>

                    <div class="col-md-6">
                        <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror"
                            name="kelas" value="{{$sar->kelas_santri}}" required autocomplete="current-kelas">

                        @error('kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('STATUS') }}</label>

                    <div class="col-md-6">
                        {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                        <select id="status" type="text" class="form-control @error('status') is-invalid @enderror"
                            name="status" required autocomplete="current-status">
                            <option value="{{$sar->status_santri}}" selected>{{$sar->status_santri}}</option>
                            @if ($sar->status_santri != "Aktif")
                            <option value="Aktif">AKTIF</option>
                            @else
                            <option value="Tidak Aktif">TIDAK AKTIF</option> 
                            @endif
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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
      @endforeach
    </tbody>
</table>



{{-- modal tambah --}}

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
                <form method="POST" action="/insert/santri" enctype="multipart/form-data">
                    @csrf
                    {{-- inputan --}}
                    <div class="form-group row">
                        <label for="nidn" class="col-md-4 col-form-label text-md-right">{{ __('NIDN SANTRI') }}</label>

                        <div class="col-md-6">
                            <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror"
                                name="nidn" value="{{ old('nidn') }}" required autocomplete="nidn" autofocus>

                            @error('nidn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    {{-- akhir inputan --}}

                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('NAMA') }}</label>

                        <div class="col-md-6">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" required autocomplete="current-nama">

                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_lahir"
                            class="col-md-4 col-form-label text-md-right">{{ __('TEMPAT LAHIR') }}</label>

                        <div class="col-md-6">
                            <input id="tempat_lahir" type="text"
                                class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                required autocomplete="current-tempat_lahir">

                            @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_lahir"
                            class="col-md-4 col-form-label text-md-right">{{ __('TANGGAL LAHIR') }}</label>

                        <div class="col-md-6">
                            <input id="tanggal_lahir" type="date"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                                required autocomplete="current-tanggal_lahir">

                            @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jk" class="col-md-4 col-form-label text-md-right">{{ __('JENIS KELAMIN') }}</label>

                        <div class="col-md-6">
                            {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                            <select id="jk" type="text" class="form-control @error('jk') is-invalid @enderror"
                                name="jk" required autocomplete="current-jk">
                                <option selected>Pilihan...</option>
                                <option value="L">LAKI-LAKI</option>
                                <option value="P">PEREMPUAN</option>
                            </select>
                            @error('jk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('ALAMAT') }}</label>

                        <div class="col-md-6">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" required autocomplete="current-alamat">

                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kelas" class="col-md-4 col-form-label text-md-right">{{ __('KELAS') }}</label>

                        <div class="col-md-6">
                            <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror"
                                name="kelas" required autocomplete="current-kelas">

                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('STATUS') }}</label>

                        <div class="col-md-6">
                            {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                            <select id="status" type="text" class="form-control @error('status') is-invalid @enderror"
                                name="status" required autocomplete="current-status">
                                <option selected>Pilihan...</option>
                                <option value="Aktif">AKTIF</option>
                                <option value="Tidak Aktif">TIDAK AKTIF</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('FOTO') }}</label>

                        <div class="col-md-6">
                            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                                name="foto" required autocomplete="current-foto">

                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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

{{-- end modal tambah --}}
@endsection
