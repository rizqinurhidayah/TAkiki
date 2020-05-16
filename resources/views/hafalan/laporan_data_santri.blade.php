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
                <th scope="col">Nama Santri</th>
                <th scope="col">NIDN</th>
                <th scope="col">Status</th>
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
            </tr>
          @endforeach
        </tbody>
        </table>
    </div>
    <div class="row">
        <div class="batas">
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