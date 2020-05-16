@extends('layouts.header')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Orang Tua</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
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
            <th scope="col">Nama Santri</th>
            <th scope="col">Nama Ayah</th>
            <th scope="col">Nama Ibu</th>
            <th scope="col">Pekerjan</th>
            <th scope="col">Alamat</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
      @php $no=1; @endphp
      @foreach ($ortu as $tua)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{$tua->Santri['nidn_santri']}}</td>
            <td>{{$tua->Santri['nama_santri']}}</td>
            <td>{{$tua->nama_ayah}}</td>
            <td>{{$tua->nama_ibu}}</td>
            <td>{{$tua->pekerjaan_ortu}}</td>
            <td>{{$tua->alamat_ortu}}</td>
            <td>{{$tua->created_at}}</td>
            <td>{{$tua->updated_at}}</td>
            <td>
              <a href="/hapus/ortu/{{$tua->id_ortu}}" class="btn btn-danger btn-circle" title="Hapus Data" onclick="return confirm('Yakin Ingin Menghapus Data?')"><span class="fas fa-trash"></a>
                <a href="" data-toggle="modal" data-target="#edit{{$no}}" class="btn btn-primary btn-circle"><span class="fas fa-edit"></a>
            </td>
        </tr>
        {{-- modal edit --}}
        <div class="modal fade" id="edit{{$no}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Orang Tua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="/edit/ortu">
                  @csrf
                  <input type="hidden" id="id_ortu" name="id_ortu" value="{{$tua->id_ortu}}">
                 {{-- inputan --}}
                  <div class="form-group row">
                      <label for="nidn" class="col-md-4 col-form-label text-md-right">{{ __('NIDN SANTRI') }}</label>
        
                      <div class="col-md-6">
                          <input id="nidn" type="text" value="{{$tua->Santri['nidn_santri']}}" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ old('nidn') }}" required autocomplete="nidn" autofocus>
        
                          @error('nidn')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  {{-- akhir inputan --}} 
                  
                  <div class="form-group row">
                      <label for="nama_ayah" class="col-md-4 col-form-label text-md-right">{{ __('NAMA AYAH') }}</label>
        
                      <div class="col-md-6">
                          <input id="nama_ayah" type="text" value="{{$tua->nama_ayah}}" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" required autocomplete="current-nama_ayah">
        
                          @error('nama_ayah')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
        
                  <div class="form-group row">
                    <label for="nama_ibu" class="col-md-4 col-form-label text-md-right">{{ __('NAMA IBU') }}</label>
        
                    <div class="col-md-6">
                        <input id="nama_ibu" type="text" value="{{$tua->nama_ibu}}" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" required autocomplete="current-nama_ibu">
        
                        @error('nama_ibu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                <label for="kerja_ortu" class="col-md-4 col-form-label text-md-right">{{ __('PEKERJAAN ORTU') }}</label>
        
                <div class="col-md-6">
                    <input id="kerja_ortu" type="text" value="{{$tua->pekerjaan_ortu}}" class="form-control @error('kerja_ortu') is-invalid @enderror" name="kerja_ortu" required autocomplete="current-kerja_ortu">
        
                    @error('kerja_ortu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
          <div class="form-group row">
            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('ALAMAT') }}</label>
        
            <div class="col-md-6">
                <input id="alamat" type="text" value="{{$tua->alamat_ortu}}" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="current-alamat">
        
                @error('alamat')
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
        {{-- akhir modal edit --}}
      @endforeach
    </tbody>
</table>

{{-- modal tambah --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Orang Tua</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/insert/ortu">
          @csrf
          
         {{-- inputan --}}
          <div class="form-group row">
              <label for="nidn" class="col-md-4 col-form-label text-md-right">{{ __('NIDN SANTRI') }}</label>

              <div class="col-md-6">
                  <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ old('nidn') }}" required autocomplete="nidn" autofocus>

                  @error('nidn')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>
          {{-- akhir inputan --}} 
          
          <div class="form-group row">
              <label for="nama_ayah" class="col-md-4 col-form-label text-md-right">{{ __('NAMA AYAH') }}</label>

              <div class="col-md-6">
                  <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" required autocomplete="current-nama_ayah">

                  @error('nama_ayah')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="nama_ibu" class="col-md-4 col-form-label text-md-right">{{ __('NAMA IBU') }}</label>

            <div class="col-md-6">
                <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" required autocomplete="current-nama_ibu">

                @error('nama_ibu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
        <label for="kerja_ortu" class="col-md-4 col-form-label text-md-right">{{ __('PEKERJAAN ORTU') }}</label>

        <div class="col-md-6">
            <input id="kerja_ortu" type="text" class="form-control @error('kerja_ortu') is-invalid @enderror" name="kerja_ortu" required autocomplete="current-kerja_ortu">

            @error('kerja_ortu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

  <div class="form-group row">
    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('ALAMAT') }}</label>

    <div class="col-md-6">
        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="current-alamat">

        @error('alamat')
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

