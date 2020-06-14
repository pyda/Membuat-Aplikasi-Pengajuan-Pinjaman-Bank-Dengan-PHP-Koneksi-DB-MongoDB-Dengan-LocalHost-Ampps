<?php
	require_once('appl.class.php');

	$applObj = new Applikasi();

	//
	if(isset($_REQUEST['flag']) && $_REQUEST['flag'] == 'delete' && $_REQUEST['kodepinjam']==''){
		header("Location:../error/500.php");
	 	exit();
	}else{
		$flag 			= $_REQUEST['flag'];
		$numtaken		= $_REQUEST['numtaken'];
		$kodepinjam 	= $_REQUEST['kodepinjam'];
		$namasales		= $_REQUEST['namasales'];
		$tglpinjam		= $_REQUEST['tglpinjam'];
		$noktp			= $_REQUEST['noktp'];
		$namapeminjam 	= $_REQUEST['namapeminjam'];
		$alamatpeminjam	= $_REQUEST['alamatpeminjam'];
		$telppeminjam	= $_REQUEST['telppeminjam'];
		$emailpeminjam	= $_REQUEST['emailpeminjam'];
		$strumahpeminjam= $_REQUEST['strumahpeminjam'];
		$namaperush		= $_REQUEST['namaperush'];
		$alamatperush	= $_REQUEST['alamatperush'];
		$telpperush		= $_REQUEST['telpperush'];
		$jbtpeminjam	= $_REQUEST['jbtpeminjam'];
		$divpeminjam	= $_REQUEST['divpeminjam'];
		$thnkerja		= $_REQUEST['thnkerja'];
		$blnkerja		= $_REQUEST['blnkerja'];
		$namadarurat	= $_REQUEST['namadarurat'];
		$alamatdarurat	= $_REQUEST['alamatdarurat'];
		$telpdarurat	= $_REQUEST['telpdarurat'];
		$sthubungan		= $_REQUEST['sthubungan'];
		$jmlpinjam		= $_REQUEST['jmlpinjam'];
		$rekpeminjam	= $_REQUEST['rekpeminjam'];
		$lamapinjam		= $_REQUEST['lamapinjam'];
	}
	// -- do delete
	if($flag == 'delete' && !empty($kodepinjam)) {
	 	$applObj->deleteApplikasi($kodepinjam);
	 	$applObj->deleteApplicant($kodepinjam);
	 	$applObj->deleteEmergency($kodepinjam);
	 	$applObj->deleteTenor($kodepinjam);
	 	$applObj->deleteCompany($kodepinjam);

	 	header("Location:../index.php?mod=xyz&pg=appl_view");
	 	exit();
	}

	/** Pengajuan */
	if($_POST['Submit']) {
		if (empty($_REQUEST['kodepinjam'])) {
			echo "<div class='pesan'>Kode Peminjaman tidak boleh kosong!</div>";
		} else {
			if($_POST['flag'] == 'edit') {
				// Update pengajuan
				// echo "ini di update eksekusi ";
				$applObj->updateApplikasi($kodepinjam);
				$applObj->updateApplicant($kodepinjam);
				$applObj->updateCompany($kodepinjam);
				$applObj->updateEmergency($kodepinjam);
				$applObj->updateTenor($kodepinjam);
		 		//exit();
			} else {
				// Create pengajuan
				// echo " ini di ydate ";
				// exit();
				$applObj->createApplikasi();
				$applObj->createApplicant();
				$applObj->createCompany();
				$applObj->createTenor();
				$applObj->createEmergency();
				$applObj->addSeq();
			}
			header("Location:../index.php?mod=xyz&pg=appl_view");
			exit();
		}
	} elseif ($_POST['Approve']) {
		if (empty($kodepinjam)) {
			echo "<div class='pesan'>Kode Peminjaman tidak boleh kosong!</div>";
		} else {
			$applObj->qcApprove($kodepinjam);
			
			header("Location:../index.php?mod=xyz&pg=qc_view");
			exit();
		}
	} elseif ($_POST['Reject']) {
		if (empty($kodepinjam)) {
			echo "<div class='pesan'>Kode Peminjaman tidak boleh kosong!</div>";
		} else {
			$applObj->qcReject($kodepinjam);
			
			header("Location:../index.php?mod=xyz&pg=qc_view");
			exit();
		}
	}
?>