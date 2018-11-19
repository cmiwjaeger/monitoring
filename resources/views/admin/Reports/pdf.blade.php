<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Provinsi</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
  
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Laporan</h2></center>  
            </div>
            <br>
            <table class="tg" style="width:80%;margin-left:auto;margin-right:auto">
              <tr>
                <th class="tg-3wr7">No<br></th>
                <th class="tg-3wr7">Date<br></th>
                <th class="tg-3wr7">Product Name<br></th>
                <th class="tg-3wr7">Supplier Name<br></th>
                <th class="tg-3wr7">Quantity<br></th>
                <th class="tg-3wr7">Value<br></th>
              </tr>
              @php($no=1)
              @foreach ($reports as $data)
              <tr>
                <td class="tg-ti5e" width="4%" style="text-align:center">{{$no++}}</td>
                <td class="tg-rv4w" width="7%">{{$data->created_at }}</td>
                <td class="tg-rv4w" width="15%">{{$data->nameproduct}}</td>
                <td class="tg-ti5e" width="15%">{{$data->namesupplier}}</td>
                <td class="tg-ti5e" width="10%">{{$data->quantity}}</td>
                <td class="tg-ti5e" width="10%">{{$data->value}}</td>
              </tr>
              @endforeach
            </table>
        </body>
    </head>
</html>