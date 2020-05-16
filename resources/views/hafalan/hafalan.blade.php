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
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h5 class="h3 mb-0 text-gray-800">Hafalan</h5>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand h3 mb-0 text-gray-800"></a>
  <form class="form-inline" method="GET" action="/hafalan">
    <input class="form-control mr-sm-2" name="cari" id="cari" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search fa-sm"></i></button>
  </form>
  <a href="/santri/Cetak_PDF" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-left:20px" ><i class="fas fa-print"></i>Cetak Data</a>
</nav>
</div>
<table class="table table-bordered">
    <thead class="table-dark" align="center">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Santri</th>
            <th scope="col">NIDN</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
      @php $no=1; @endphp
      @foreach ($santri as $sar)
        <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$sar->nama_santri}}</td>
            <td>{{$sar->nidn_santri}}</td>
            <td>
                @php $status= DB::table('tb_hafalan')->where('id_santri',$sar->id_santri)->where('status_hafalan','Belum tercapai')->first(); @endphp
                @if ($status == null)
                    Tercapai
                @else
                    Belum Tercapai
                @endif
            </td>
            <td align="center">
              <a href="/hafalan/detail/{{$sar->id_santri}}" class="btn btn-danger btn-circle"><span class="fas fa-info"></a>
              <a href="/Cetak_PDF/{{$sar->id_santri}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  ><i class="fas fa-print"></i></a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>

@endsection
