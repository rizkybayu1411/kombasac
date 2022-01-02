
<?php
$nilai = 0;
foreach ($kirimtugas as $key) {
  $nilai_db = DB::table('nilais')->where('kirimtugas_id', $key->id)->first();
  if($nilai_db){
    $nilai += $nilai_db->nilai;
  }
}
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<div style="width:975px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:925px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Sertifikat Kelas Online</span>
       <br><br>
       <span style="font-size:25px"><i>Kami Menyatakan Bahwa :</i></span>
       <br><br>
       <span style="font-size:30px"><b>{{Auth::user()->name}}</b></span><br/><br/>
       <span style="font-size:25px"><i>Telah Menyelesaikan</i></span> <br/><br/>
       <span style="font-size:30px">{{$kelas->name_kelas}}</span> <br/><br/>
       <span style="font-size:20px">dengan total nilai <b>{{$nilai}}</b></span> <br/><br/><br/><br/>
       <span style="font-size:25px"><i>Pada Tanggal</i></span><br>
      <span style="font-size:30px">{{tgl_indo(date('Y-m-d'))}}</span>
</div>
</div>