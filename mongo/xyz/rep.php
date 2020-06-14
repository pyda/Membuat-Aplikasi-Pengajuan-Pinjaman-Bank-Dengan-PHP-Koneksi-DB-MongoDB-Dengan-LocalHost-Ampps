<?php 
  //Getting mahasiswas
  include('xyz/appl.class.php');
  $applObj = new Applikasi();
  $listAppl = $applObj->getListApplikasi();
  $total = $applObj->getCountApplikasi();
  $approve = $applObj->getCountApprove();
  $reject = $applObj->getCountReject();
?>
<!--- kode untuk menampilkan data di table -->
<table width="100%">
  <tr>
    <td align="center"><a class= "button primary" style="height: 50px; width: 100px"><h4><?php echo($total) ?></h4></a></td>
    <td align="center"><a class= "button success" style="height: 50px; width: 100px"><h4><?php echo($approve) ?></h4></a></td>
    <td align="center"><a class= "button danger" style="height: 50px; width: 100px"><h4><?php echo($reject) ?></h4></a></td>
  </tr>
  <tr>
    <td align="center"><span style="small">Total Pengajuan</span></td>
    <td align="center"><span style="small">Pengajuan Disetujui</span></td>
    <td align="center"><span style="small">Pengajuan Ditolak</span></td>
  </tr>
  <tr>
    <td colspan="3"><hr></td>
  </tr>
</table>
<h3>Laporan Pengajuan Pinjaman</h3>

<table class="table bordered hovered table-bordered" style="margin-top: 25px">
  <thead>
    <th>No. Form Peminjaman</th>
    <th>Nama Peminjam</th>
    <th>Status</th>
    <th>Nomor Persetujuan</th>
    <th>Tanggal Persetujuan</th>
  </thead>
  <tbody>
     <?php 
     foreach ($listAppl as $applikasi) :
        $kodepinjam = (isset($applikasi['_id']) ? $applikasi['_id'] : '');   
        $namapeminjam = (isset($applikasi['namapeminjam']) ? $applikasi['namapeminjam'] : '');
      ?>
    <tr>
      <td align="center"><?php echo $kodepinjam ?></td>
      <td align="center"><?php echo $namapeminjam ?></td>
      <td align="center">
        <?php 
        $qcObj =  $applObj->checkQC($kodepinjam);
        if (empty($qcObj)){
          $nomorqc = (isset($qcObj['_id']) ? $qcObj['_id'] : '-');
          $statusqc = (isset($qcObj['status']) ? $qcObj['status'] : '-');
          $tglqc = (isset($qcObj['tglapprove']) ? $qcObj['tglapprove'] : '-');

          if ($statusqc=='1') {
            $statusqc='Diterima';
          } elseif ($statusqc=='2') {
            $statusqc='Ditolak';
          } else {
            $statusqc='Belum Proses';
          }
        } else {
          $nomorqc = (isset($qcObj['_id']) ? $qcObj['_id'] : '-');
          $statusqc = (isset($qcObj['status']) ? $qcObj['status'] : '-');
          $tglqc = (isset($qcObj['tglapprove']) ? $qcObj['tglapprove'] : '-');

          if ($statusqc=='1') {
            $statusqc='Diterima';
          } elseif ($statusqc=='2') {
            $statusqc='Ditolak';
          } else {
            $statusqc='Belum Proses';
          }
        }
        echo($statusqc);
        ?>
      </td>
      <td align="center">
        <?php
        echo($nomorqc);
        ?>
      </td>
      <td align="center">
        <?php
        echo($tglqc);
        ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

