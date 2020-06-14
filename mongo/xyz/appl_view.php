<?php 
  //Getting mahasiswas
  include('xyz/appl.class.php');
  $applObj = new Applikasi();
  $listAppl = $applObj->getListApplikasi();
?>
<!--- kode untuk menampilkan data di table -->
<h3>Daftar Pengajuan Pinjaman</h3>
<a class="button primary" href='index.php?mod=xyz&pg=appl_form&flag=tambah'>Tambah Pengajuan</a>
<p>
    <!-- desc -->
</p>
<table class="table bordered hovered table-bordered">
  <thead>
    <th>No. Form Peminjaman</th>
    <th>Nama Peminjam</th>
    <th>Status</th>
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
          $qcStatus = 'Belum QC';
        } else {
          $qcStatus = 'Selesai QC';
        }
        echo($qcStatus);
        ?>
        </td>
      <td width="200px"><center>
        <?php echo ($qcStatus=='Belum QC') ? 
        '
        <a href="index.php?mod=xyz&pg=appl_form&flag=edit&kodepinjam='.$kodepinjam.'" class= "button success">Edit</a>
        &nbsp;
        <a href="xyz/appl_action.php?flag=delete&kodepinjam='.$kodepinjam.'" class="button danger">Delete</a>
        ' : 
        '
        <a href="#" class= "button success disabled">Edit</a>
        &nbsp;
        <a href="#" class="button danger disabled">Delete</a>
        ';?>
        
      </center></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

