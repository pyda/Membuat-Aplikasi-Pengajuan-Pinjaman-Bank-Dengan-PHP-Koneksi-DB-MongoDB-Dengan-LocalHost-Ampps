<?php
	include ('xyz/appl.class.php');

	$appl = new Applikasi();
	$seqN = new seqNumber();

	$flag 			= (isset($_GET['flag']) ? $_GET['flag'] : '');
	$status			= (isset($_GET['status']) ? $_GET['status'] : '');
	$numtaken 		= (isset($_GET['numtaken']) ? $_GET['numtaken'] : '');
	$kodepinjam 	= (isset($_GET['kodepinjam']) ? $_GET['kodepinjam'] : '');
	$namasales		= (isset($_GET['namasales']) ? $_GET['namasales'] : '');
	$tglpinjam		= (isset($_GET['tglpinjam']) ? $_GET['tglpinjam'] : '');
	$noktp			= (isset($_GET['noktp']) ? $_GET['noktp'] : '');
	$namapeminjam 	= (isset($_GET['namapeminjam']) ? $_GET['namapeminjam'] : '');
	$alamatpeminjam	= (isset($_GET['alamatpeminjam']) ? $_GET['alamatpeminjam'] : '');
	$telppeminjam	= (isset($_GET['telppeminjam']) ? $_GET['telppeminjam'] : '');
	$emailpeminjam	= (isset($_GET['emailpeminjam']) ? $_GET['emailpeminjam'] : '');
	$strumahpeminjam= (isset($_GET['strumahpeminjam']) ? $_GET['strumahpeminjam'] : '');
	$namaperush		= (isset($_GET['namaperush']) ? $_GET['namaperush'] : '');
	$alamatperush	= (isset($_GET['alamatperush']) ? $_GET['alamatperush'] : '');
	$telpperush		= (isset($_GET['telpperush']) ? $_GET['telpperush'] : '');
	$jbtpeminjam	= (isset($_GET['jbtpeminjam']) ? $_GET['jbtpeminjam'] : '');
	$divpeminjam	= (isset($_GET['divpeminjam']) ? $_GET['divpeminjam'] : '');
	$thnkerja		= (isset($_GET['thnkerja']) ? $_GET['thnkerja'] : '');
	$blnkerja		= (isset($_GET['blnkerja']) ? $_GET['blnkerja'] : '');
	$namadarurat	= (isset($_GET['namadarurat']) ? $_GET['namadarurat'] : '');
	$alamatdarurat	= (isset($_GET['alamatdarurat']) ? $_GET['alamatdarurat'] : '');
	$telpdarurat	= (isset($_GET['telpdarurat']) ? $_GET['telpdarurat'] : '');
	$sthubungan		= (isset($_GET['sthubungan']) ? $_GET['sthubungan'] : '');
	$jmlpinjam		= (isset($_GET['jmlpinjam']) ? $_GET['jmlpinjam'] : '');
	$rekpeminjam	= (isset($_GET['rekpeminjam']) ? $_GET['rekpeminjam'] : '');
	$lamapinjam		= (isset($_GET['lamapinjam']) ? $_GET['lamapinjam'] : '');

	if ($flag == 'edit' && !empty($kodepinjam)) {
	    //Getting nama details by nama id
	    $editAppl = $appl -> getApplikasiByNo($kodepinjam);
		$editAplc = $appl -> getApplicantByNo($kodepinjam);
		$editEmer = $appl -> getEmergencyByNo($kodepinjam);
		$editTeno = $appl -> getTenorByNo($kodepinjam);
		$editComp = $appl -> getCompanyByNo($kodepinjam);

		//$flag 			= (isset($_GET['flag']) ? $_GET['flag'] : '');
		//$numtaken 		= (isset($_GET['numtaken']) ? $_GET['numtaken'] : '');
		$kodepinjam 	= (isset($editAppl['kodepinjam']) ? $editAppl['kodepinjam'] : '');
		$namasales		= (isset($editAppl['namasales']) ? $editAppl['namasales'] : '');
		$tglpinjam		= (isset($editAppl['tglpinjam']) ? $editAppl['tglpinjam'] : '');
		$noktp			= (isset($editAplc['noktp']) ? $editAplc['noktp'] : '');
		$namapeminjam 	= (isset($editAplc['namapeminjam']) ? $editAplc['namapeminjam'] : '');
		$alamatpeminjam	= (isset($editAplc['alamatpeminjam']) ? $editAplc['alamatpeminjam'] : '');
		$telppeminjam	= (isset($editAplc['telppeminjam']) ? $editAplc['telppeminjam'] : '');
		$emailpeminjam	= (isset($editAplc['emailpeminjam']) ? $editAplc['emailpeminjam'] : '');
		$strumahpeminjam= (isset($editAplc['strumahpeminjam']) ? $editAplc['strumahpeminjam'] : '');

		$namaperush		= (isset($editComp['namaperush']) ? $editComp['namaperush'] : '');
		$alamatperush	= (isset($editComp['alamatperush']) ? $editComp['alamatperush'] : '');
		$telpperush		= (isset($editComp['telpperush']) ? $editComp['telpperush'] : '');
		$jbtpeminjam	= (isset($editComp['jbtpeminjam']) ? $editComp['jbtpeminjam'] : '');
		$divpeminjam	= (isset($editComp['divpeminjam']) ? $editComp['divpeminjam'] : '');
	
		$thnkerja		= (isset($editAplc['thnkerja']) ? $editAplc['thnkerja'] : '');
		$blnkerja		= (isset($editAplc['blnkerja']) ? $editAplc['blnkerja'] : '');
	
		$namadarurat	= (isset($editEmer['namadarurat']) ? $editEmer['namadarurat'] : '');
		$alamatdarurat	= (isset($editEmer['alamatdarurat']) ? $editEmer['alamatdarurat'] : '');
		$telpdarurat	= (isset($editEmer['telpdarurat']) ? $editEmer['telpdarurat'] : '');
		$sthubungan		= (isset($editEmer['sthubungan']) ? $editEmer['sthubungan'] : '');
		
		$jmlpinjam		= (isset($editTeno['jmlpinjam']) ? $editTeno['jmlpinjam'] : '');
		$rekpeminjam	= (isset($editTeno['rekpeminjam']) ? $editTeno['rekpeminjam'] : '');
		$lamapinjam		= (isset($editTeno['lamapinjam']) ? $editTeno['lamapinjam'] : '');
	} else if ($flag == 'tambah') {
		$lastseq = $seqN -> getSeqNumber();
		$maxseq='0';

		foreach ($lastseq as $doc) {
			if (!(max($arr = (array($doc['numtaken']))))) {
				$maxseq=max($arr = (array($doc['numtaken'])));
			}
		}
		$numtaken = $maxseq+1;
		$seqpad = sprintf("%04s", $numtaken);
		$year = date('Y');
	} elseif ($flag == 'qc' && !empty($kodepinjam)) {
		//Getting nama details by nama id
	    $editAppl = $appl -> getApplikasiByNo($kodepinjam);
		$editAplc = $appl -> getApplicantByNo($kodepinjam);
		$editEmer = $appl -> getEmergencyByNo($kodepinjam);
		$editTeno = $appl -> getTenorByNo($kodepinjam);
		$editComp = $appl -> getCompanyByNo($kodepinjam);

		//flag 			= (isset($_GET['flag']) ? $_GET['flag'] : '');
		//$numtaken 		= (isset($_GET['numtaken']) ? $_GET['numtaken'] : '');
		$kodepinjam 	= (isset($editAppl['kodepinjam']) ? $editAppl['kodepinjam'] : '');
		$namasales		= (isset($editAppl['namasales']) ? $editAppl['namasales'] : '');
		$tglpinjam		= (isset($editAppl['tglpinjam']) ? $editAppl['tglpinjam'] : '');
		$noktp			= (isset($editAplc['noktp']) ? $editAplc['noktp'] : '');
		$namapeminjam 	= (isset($editAplc['namapeminjam']) ? $editAplc['namapeminjam'] : '');
		$alamatpeminjam	= (isset($editAplc['alamatpeminjam']) ? $editAplc['alamatpeminjam'] : '');
		$telppeminjam	= (isset($editAplc['telppeminjam']) ? $editAplc['telppeminjam'] : '');
		$emailpeminjam	= (isset($editAplc['emailpeminjam']) ? $editAplc['emailpeminjam'] : '');
		$strumahpeminjam= (isset($editAplc['strumahpeminjam']) ? $editAplc['strumahpeminjam'] : '');

		$namaperush		= (isset($editComp['namaperush']) ? $editComp['namaperush'] : '');
		$alamatperush	= (isset($editComp['alamatperush']) ? $editComp['alamatperush'] : '');
		$telpperush		= (isset($editComp['telpperush']) ? $editComp['telpperush'] : '');
		$jbtpeminjam	= (isset($editComp['jbtpeminjam']) ? $editComp['jbtpeminjam'] : '');
		$divpeminjam	= (isset($editComp['divpeminjam']) ? $editComp['divpeminjam'] : '');
	
		$thnkerja		= (isset($editAplc['thnkerja']) ? $editAplc['thnkerja'] : '');
		$blnkerja		= (isset($editAplc['blnkerja']) ? $editAplc['blnkerja'] : '');
	
		$namadarurat	= (isset($editEmer['namadarurat']) ? $editEmer['namadarurat'] : '');
		$alamatdarurat	= (isset($editEmer['alamatdarurat']) ? $editEmer['alamatdarurat'] : '');
		$telpdarurat	= (isset($editEmer['telpdarurat']) ? $editEmer['telpdarurat'] : '');
		$sthubungan		= (isset($editEmer['sthubungan']) ? $editEmer['sthubungan'] : '');
		
		$jmlpinjam		= (isset($editTeno['jmlpinjam']) ? $editTeno['jmlpinjam'] : '');
		$rekpeminjam	= (isset($editTeno['rekpeminjam']) ? $editTeno['rekpeminjam'] : '');
		$lamapinjam		= (isset($editTeno['lamapinjam']) ? $editTeno['lamapinjam'] : '');
	}
?>
<div class='row'>
	<div class='col 12'>
		<h1>Aplikasi Peminjaman</h1>
		<h3>
		<?php
			if ($flag == 'tambah') {
				echo "Tambah Pengajuan";
			} elseif ($flag=='qc') {
				echo "Quality Control";
			} else {
				echo "Edit Pengajuan";
			}
		?></h3>
		<form id='form1' class='form-horizontal' action="xyz/appl_action.php" method="POST">
			<!--
			<label>NIM</label>
			<div class="input-control text size2 " data-role="input-control">
				<input class='required' type="text" name='nim' value="<?php //echo($nim) ?>"
				<?php //echo($flag == 'edit') ? 'readonly="readonly"' : '' ?>>
			</div>

			<label>nama</label>
			<div class="input-control text" data-role="input-control">
				<input class='required' type="text" name='nama'  value="<?php //echo($nama) ?>">
			</div>
		-->
			<input type="hidden" name="flag" value="<?php echo($flag) ?>" />
			<input type="hidden" name="numtaken" value="<?php echo($numtaken) ?>" />
			<table class="table">
				<tr>
					<td colspan="2">
						<hr>
						Data Sales
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						No. Form Peminjaman
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' readonly="readonly" type="text" name='kodepinjam' value=
							"<?php
							echo($flag == 'tambah') ? ("PINJ-".$year.$seqpad) : ($kodepinjam)
							?>"
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Nama Sales
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='namasales' value="<?php echo($namasales) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Tanggal Form Peminjaman
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="date" name='tglpinjam' value="<?php echo($tglpinjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
						Data Peminjam
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						No. Identitas
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='noktp' value="<?php echo($noktp) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Nama Peminjam
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='namapeminjam' value="<?php echo($namapeminjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Alamat
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="" name='alamatpeminjam' value="<?php echo($alamatpeminjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Telepon
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="" name='telppeminjam' value="<?php echo($telppeminjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						e-Mail
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="email" name='emailpeminjam' value="<?php echo($emailpeminjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Status Tempat Tinggal
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input type="hidden" name="strumahpeminjam" value="<?php echo($strumahpeminjam)?>">
							<select class="required" name="strumahpeminjam"
							<?php
							echo($flag == 'qc') ? 'disabled' : '';
							?>
							>
								<option value="1" <?php echo(($flag=='edit' || $flag=='qc') && $strumahpeminjam==1)?'selected':'' ?>>Milik Sendiri</option>
								<option value="2" <?php echo(($flag=='edit' || $flag=='qc') && $strumahpeminjam==2)?'selected':'' ?>>Milik Orang Tua</option>
								<option value="3" <?php echo(($flag=='edit' || $flag=='qc') && $strumahpeminjam==3)?'selected':'' ?>>Sewa/Kontrak/Kost</option>
								<option value="4" <?php echo(($flag=='edit' || $flag=='qc') && $strumahpeminjam==4)?'selected':'' ?>>Lainnya</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
						Pekerjaan
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						Nama Instansi/Perusahaan
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='namaperush' value="<?php echo($namaperush) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Alamat Instansi/Perusahaan
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='alamatperush' value="<?php echo($alamatperush) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Telepon Instansi/Perusahaan
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='telpperush' value="<?php echo($telpperush) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Jabatan/Posisi
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='jbtpeminjam' value="<?php echo($jbtpeminjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Divisi/Departemen
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='divpeminjam' value="<?php echo($divpeminjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Lama Bekerja
					</td>
					<td>
						<div class="input-control text size2" data-role="input-control">
							<input class='required' type="number" name='thnkerja' value="<?php echo($thnkerja) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
						&nbsp;&nbsp;tahun&nbsp;&nbsp;
						<div class="input-control text size2" data-role="input-control">
							<input class='required' type="number" name='blnkerja' value="<?php echo($blnkerja) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
						&nbsp;&nbsp;bulan
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
						Kontak Darurat
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						Nama
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='namadarurat' value="<?php echo($namadarurat) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Alamat
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='alamatdarurat' value="<?php echo($alamatdarurat) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Telepon
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='telpdarurat' value="<?php echo($telpdarurat) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Hubungan dengan Peminjam
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='sthubungan' value="<?php echo($sthubungan) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
						Detail Peminjaman
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						Nominal Peminjaman
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="number" name='jmlpinjam' value="<?php echo($jmlpinjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Nomor Rekening
					</td>
					<td>
						<div class="input-control text " data-role="input-control">
							<input class='required' type="text" name='rekpeminjam' value="<?php echo($rekpeminjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Lama Cicilan Peminjaman
					</td>
					<td>
						<div class="input-control text size3" data-role="input-control">
							<input class='required' type="number" name='lamapinjam' value="<?php echo($lamapinjam) ?>"
							<?php
							echo($flag == 'qc') ? 'readonly="readonly"' : '';
							?>>
						</div>
						&nbsp;&nbsp;bulan
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<!--<input class="button success" name="Submit" type="submit" value="Simpan" />
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php?mod=xyz&pg=appl_view">
							<input class="button danger" name="Submit" type="button" value="Batal" />
						</a>-->
						<?php
						if ($flag == 'qc' && $status=='0'){
						echo('
						<input class="button success" name="Approve" type="submit" value="Setuju" />
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="button danger" name="Reject" type="submit" value="Tolak" />
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php?mod=xyz&pg=qc_view">
							<input class="button primary" name="Submit" type="button" value="Batal" />
						</a>
						');
						} elseif ($flag == 'qc' && $status=='1') {
						echo('
						<a href="index.php?mod=xyz&pg=qc_view">
							<input class="button primary" name="Submit" type="button" value="Kembali" />
						</a>
						');
						} else {
						echo('
						<input class="button success" name="Submit" type="submit" value="Simpan" />
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php?mod=xyz&pg=appl_view">
							<input class="button danger" name="Submit" type="button" value="Batal" />
						</a>
						');
						}?>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>