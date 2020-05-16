@extends('layouts.header')

@section('content')

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
@endif{{-- end alert --}}
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">Detail Hafalan</h3>
</div> --}}
<div class="row ">
    <div class="col-3">
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <h5 align="center">Profile Santri</h5>
                    <a class="card-link text-center" data-toggle="collapse" href="#collapseOne">
                        <img src="/img/{{$santri->foto}}" class="img-fluid mx-auto d-block">
                        <h5><i class="fas fa-user-tie"></i> {{$santri->nama_santri}}</h5>
                        <p>{{$santri->nidn_santri}}</p>
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        <p><i class="fas fa-hospital"></i> <span
                                class="font-weight-bold">{{$santri->tempat_lahir_santri}}
                                {{$santri->tanggal_lahir_santri}}</span></p>
                        <p><i class="fas fa-users"></i> <span class="font-weight-bold">Kelas
                                {{$santri->kelas_santri}}</span></p>
                        <p><i class="fas fa-at"></i> <span class="font-weight-bold">Status
                                {{$santri->status_santri}}</span></p>
                        <p><i class="fas fa-map-marker-alt"></i> <span
                                class="font-weight-bold">{{$santri->alamat_santri}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- chart --}}
    <div class="col-9">
        <div id="chart"></div>
    </div>
    {{-- endchart --}}
    
</div><br>
{{-- table --}}

<!-- Page Heading -->
<div class="d-sm-flex align-items-   justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Hafalan</h1>

    <a href="/hafalan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
       ></i>Kembali Data Hafalan</a>
</div>
<table class="table table-bordered">
    <thead class="table-dark" align="center">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Waktu</th>
            <th scope="col">Surah/Ayat</th>
            <th scope="col">Tajwid</th>
            <th scope="col">Ket Hafalan</th>
            <th scope="col">Status Hafalan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach ($hafalan as $haf)
        <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$haf->waktu_hafalan}}</td>
            <td>{{$haf->surah_hafalan['nama_surah']}} {{$haf->target_hafalan['ayat']}}</td>
            <td>{{$haf->tajwid}}</td>
            <td>{{$haf->ket_hafalan}}</td>
            <td>{{$haf->status_hafalan}}</td>
            <td>
                @if ($haf->status_hafalan != "Tercapai")
                <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#edit{{$no}}"><span
                        class="fas fa-check"></a>
                @else
                <a href="#" class="btn btn-primary btn-circle">
                    <span class="fas fa-check"></a>
                @endif
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
                    <form method="POST" action="/tercapai">
                            @csrf
                            <input type="hidden" id="id_hafalan" name="id_hafalan" value="{{$haf->id_hafalan}}">
                            <input type="hidden" id="id_santri" name="id_santri" value="{{$santri->id_santri}}">
                            <div class="form-group row">
                                <label for="tajwid"
                                    class="col-md-4 col-form-label text-md-right">{{ __('TAJWID') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                                    <select id="tajwid" type="text"
                                        class="form-control @error('tajwid') is-invalid @enderror" name="tajwid"
                                        required autocomplete="current-surah">
                                        <option selected>Pilhan...</option>
                                        <option value="Sangat Baik">Sangat Baik</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                    </select>
                                    @error('tajwid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="ket_hafalan"
                                  class="col-md-4 col-form-label text-md-right">{{ __('KET HAFALAN') }}</label>

                              <div class="col-md-6">
                                  {{-- <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="current-status"> --}}
                                  <select id="ket_hafalan" type="text"
                                      class="form-control @error('ket_hafalan') is-invalid @enderror" name="ket_hafalan"
                                      required autocomplete="current-surah">
                                      <option selected>Pilhan...</option>
                                      <option value="Pekan Pertama">Pekan Pertama</option>
                                      <option value="Pekan Kedua">Pekan Kedua</option>
                                      <option value="Pekan Ketiga">Pekan Ketiga</option>
                                  </select>
                                  @error('ket_hafalan')
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
@endsection
@section('chart')
<script src="{{ asset('js/chart.js') }}"></script>
<script>
    {{-- chart --}}
    Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Pekan Hafalan',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Pekan Pertama',
            data: [{{{$pertama}}}]
    
        }, {
            name: 'Pekan Kedua',
            data: [{{{$kedua}}}]
    
        }, {
            name: 'Pekan Ketiga',
            data: [{{{$ketiga}}}]
    
        }]
    });
    {{-- endchart --}}
</script>
@endsection

