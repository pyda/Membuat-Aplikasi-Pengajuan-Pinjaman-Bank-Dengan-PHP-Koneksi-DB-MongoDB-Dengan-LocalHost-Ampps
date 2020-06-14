<?php 
  //Getting mahasiswas
  include('xyz/appl.class.php');
  $applObj = new Applikasi();
  $listAppl = $applObj->getListApplikasi();
?>
<!--- kode untuk menampilkan data di table -->
<h3>Daftar Pengajuan Pinjaman</h3>
<table class="table bordered hovered table-bordered">
  <thead>
    <th>No. Form Peminjaman</th>
    <th>Nama Peminjam</th>
    <th>Status</th>
    <th>Nomor Persetujuan</th>
    <th>Tanggal Persetujuan</th>
    <th>Aksi</th>
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
      <td width="150px"><center>
        <?php
        if ($statusqc == 'Belum Proses') {
        echo('<a href="index.php?mod=xyz&pg=appl_form&flag=qc&status=0&kodepinjam='.$kodepinjam.'" class= "button primary">Lihat Detil</a>');
        } else {
        echo('<a href="index.php?mod=xyz&pg=appl_form&flag=qc&status=1&kodepinjam='.$kodepinjam.'" class= "button primary">Lihat Detil</a>');
        }
        ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

