<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang</title>
</head>
<style>
    .header{
        
    }
    .column {
        /* line-height: 1.5; */
        text-align: center;
        float: left;
        width: 85%;
        /* padding: 20px; */
    }
        /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    .td {
        /* line-height: 1.5; */
        text-align: center;
        float: left;
        width: 30%;
        /* padding: 20px; */
    }
    .batas{
        text-align: center;
        float: left;
        width: 30%;
        /* padding: 10px; */
    }
    .batass{
        float: left;
        width: 40%;
        /* padding: 10px; */
    }
    .gambar{
        float: left;
        width: 15%;
        /* padding: 10px; */
    }
    table {
			/* margin: auto; */
            margin: 0;
	        padding: 0;
	        width: 100%;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;

		}
</style>
<body>
    <div class="row">
        <div class="gambar">
            <img src="{{ public_path("logoo.PNG")}}" height="90px" width="90px">
        </div>
        <div class="column">
            <h5>LAPORAN HAFALAN<br>IKATAN PELAJAR RIAU YOGYAKARTA KOMISARIAT SIAK
                PERIODE 2019-2020<br>Sekretariat : Jl. Kusuma Gendeng, Gg. Mujair No.808 Timoho, Yogyakarta<hr></h5>
        </div>
        
    </div>
    <br>
    <div class="isi">
        <table >
        <thead align="left">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Waktu</th>
                <th scope="col">Surah/Ayat</th>
                <th scope="col">Tajwid</th>
                <th scope="col">Ket Hafalan</th>
                <th scope="col">Status Hafalan</th>
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
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <div class="row">
        <div class="batas">
            <br>
            <h6>{{$santri->nama_santri}}</h6>
            <br>
            <h6>(..............................................)</h6>
        </div>
        <div class="batass">
        </div>
        <div class="td">
            <br>
            <h6>Yogyakarta,{{now()}}</h6>
            <br>
            <h6>(..............................................)</h6>
        </div>
    </div>
</body>
</html>