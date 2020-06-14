<?php
    class Applikasi {
        var $mongo;
        var $db;
        var $table;

        //init
        public function __construct() {
            try {
                //Connect to Mongo
                $this -> mongo = new MongoClient('127.0.0.1:27017');

                $this -> db = $this -> mongo -> selectDB('298_Perbankan');

                //$tableName = 'application_form';
                //$this -> table = $this -> db -> $tableName;
            } catch(Exception $e) {
                echo "Something Went Wrong.";
                exit();
            }
        }

        //TAMBAH SEQUENCE
        public function addSeq()
        {
            $tableName = 'seq_form';
            $this -> table = $this -> db -> $tableName;
            $numtaken     = (int)$_POST['numtaken'];

            $insert = array("numtaken" => $numtaken);
            $this -> table -> insert($insert);
        }

        //TAMBAH PENGAJUAN/APPLICATION FORM
        public function createApplikasi() {
            $tableName = 'application_form';
            $this -> table = $this -> db -> $tableName;

            $kodepinjam     = $_POST['kodepinjam'];
            $namasales      = $_POST['namasales'];
            $tglpinjam      = $_POST['tglpinjam'];

            $insert = array("kodepinjam" => $kodepinjam, "namasales" => $namasales, "tglpinjam" => $tglpinjam, "filektp" => '', "filenpwp" => '', "fileslip" => '');
            $this -> table -> insert($insert);
        }

        //tambah data applicant
        public function createApplicant() {
            $tableName = 'applicant';
            $this -> table = $this -> db -> $tableName;

            $kodepinjam     = $_POST['kodepinjam'];
            $noktp          = $_POST['noktp'];
            $namapeminjam   = $_POST['namapeminjam'];
            $alamatpeminjam = $_POST['alamatpeminjam'];
            $telppeminjam   = $_POST['telppeminjam'];
            $emailpeminjam  = $_POST['emailpeminjam'];
            $strumahpeminjam= $_POST['strumahpeminjam'];
            $thnkerja       = $_POST['thnkerja'];
            $blnkerja       = $_POST['blnkerja'];

            $insert = array("_id" => $kodepinjam, "noktp" => $noktp, "namapeminjam" => $namapeminjam, "alamatpeminjam" => $alamatpeminjam, "telppeminjam" => $telppeminjam, "emailpeminjam" => $emailpeminjam, "strumahpeminjam" => $strumahpeminjam, "thnkerja" => $thnkerja, "blnkerja" => $blnkerja);
            $this -> table -> insert($insert);
        }

        //tambah data company
        public function createCompany() {
            $tableName = 'company';
            $this -> table = $this -> db -> $tableName;

            $kodepinjam     = $_POST['kodepinjam'];
            $namaperush     = $_POST['namaperush'];
            $alamatperush   = $_POST['alamatperush'];
            $telpperush     = $_POST['telpperush'];
            $jbtpeminjam    = $_POST['jbtpeminjam'];
            $divpeminjam    = $_POST['divpeminjam'];

            $insert = array("_id" => $kodepinjam, "namaperush" => $namaperush, "alamatperush" => $alamatperush, "telpperush" => $telpperush, "jbtpeminjam" => $jbtpeminjam, "divpeminjam" => $divpeminjam);
            $this -> table -> insert($insert);
        }

        //tambah data kontak
        public function createEmergency() {
            $tableName = 'emergency_cont';
            $this -> table = $this -> db -> $tableName;

            $kodepinjam     = $_POST['kodepinjam'];
            $namadarurat    = $_POST['namadarurat'];
            $alamatdarurat  = $_POST['alamatdarurat'];
            $telpdarurat    = $_POST['telpdarurat'];
            $sthubungan     = $_POST['sthubungan'];

            $insert = array("_id" => $kodepinjam, "namadarurat" => $namadarurat, "alamatdarurat" => $alamatdarurat, "telpdarurat" => $telpdarurat, "sthubungan" => $sthubungan);
            $this -> table -> insert($insert);
        }

        //tambah data tenor
        public function createTenor() {
            $tableName = 'tenor';
            $this -> table = $this -> db -> $tableName;

            $kodepinjam     = $_POST['kodepinjam'];
            $jmlpinjam      = $_POST['jmlpinjam'];
            $rekpeminjam    = $_POST['rekpeminjam'];
            $lamapinjam     = $_POST['lamapinjam'];

            $insert = array("_id" => $kodepinjam, "jmlpinjam" => $jmlpinjam, "rekpeminjam" => $rekpeminjam, "lamapinjam" => $lamapinjam);
            $this -> table -> insert($insert);
        }

        //Update Applikasi
        public function updateApplikasi($kodepinjam) {
            $tableName = 'application_form';
            $this -> table = $this -> db -> $tableName;

            $query = array('kodepinjam' => $kodepinjam);

            //Get the existing info of the user
            $dataAppl = $this -> table -> findOne($query);

            //Assign New Values
            $dataAppl['kodepinjam'] = $_POST['kodepinjam'];
            $dataAppl['namasales'] = $_POST['namasales'];
            $dataAppl['tglpinjam'] = $_POST['tglpinjam'];

            //Update the User Info
            $this -> table -> save($dataAppl);
        }

        //Update Applikasi
        public function updateApplicant($kodepinjam) {
            $tableName = 'applicant';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            //Get the existing info of the user
            $dataAppl = $this -> table -> findOne($query);

            //Assign New Values
            $dataAppl['_id'] = $_POST['kodepinjam'];
            $dataAppl['noktp'] = $_POST['noktp'];
            $dataAppl['namapeminjam'] = $_POST['namapeminjam'];
            $dataAppl['alamatpeminjam'] = $_POST['alamatpeminjam'];
            $dataAppl['telppeminjam'] = $_POST['telppeminjam'];
            $dataAppl['emailpeminjam'] = $_POST['emailpeminjam'];
            $dataAppl['strumahpeminjam'] = $_POST['strumahpeminjam'];
            $dataAppl['thnkerja'] = $_POST['thnkerja'];
            $dataAppl['blnkerja'] = $_POST['blnkerja'];

            //Update the User Info
            $this -> table -> save($dataAppl);
        }

        //Update Applikasi
        public function updateCompany($kodepinjam) {
            $tableName = 'company';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            //Get the existing info of the user
            $dataAppl = $this -> table -> findOne($query);

            //Assign New Values
            $dataAppl['_id'] = $_POST['kodepinjam'];
            $dataAppl['namaperush'] = $_POST['namaperush'];
            $dataAppl['alamatperush'] = $_POST['alamatperush'];
            $dataAppl['telpperush'] = $_POST['telpperush'];
            $dataAppl['jbtpeminjam'] = $_POST['jbtpeminjam'];
            $dataAppl['divpeminjam'] = $_POST['divpeminjam'];

            //Update the User Info
            $this -> table -> save($dataAppl);
        }

        //Update Applikasi
        public function updateEmergency($kodepinjam) {
            $tableName = 'emergency_cont';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            //Get the existing info of the user
            $dataAppl = $this -> table -> findOne($query);

            //Assign New Values
            $dataAppl['_id'] = $_POST['kodepinjam'];
            $dataAppl['namadarurat'] = $_POST['namadarurat'];
            $dataAppl['alamatdarurat'] = $_POST['alamatdarurat'];
            $dataAppl['telpdarurat'] = $_POST['telpdarurat'];
            $dataAppl['sthubungan'] = $_POST['sthubungan'];

            //Update the User Info
            $this -> table -> save($dataAppl);
        }

        //Update Applikasi
        public function updateTenor($kodepinjam) {
            $tableName = 'tenor';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            //Get the existing info of the user
            $dataAppl = $this -> table -> findOne($query);

            //Assign New Values
            $dataAppl['_id'] = $_POST['kodepinjam'];
            $dataAppl['jmlpinjam'] = $_POST['jmlpinjam'];
            $dataAppl['rekpeminjam'] = $_POST['rekpeminjam'];
            $dataAppl['lamapinjam'] = $_POST['lamapinjam'];

            //Update the User Info
            $this -> table -> save($dataAppl);
        }

        //cek status QC
        public function checkQC($kodepinjam){
            $tableName = 'quality_control';
            $this -> table = $this -> db -> $tableName;

            $query = array('kodepinjam' => $kodepinjam);

            $qc = $this -> table -> findOne($query);// tes dikomen -> limit($limit);

            return $qc;
        }

        //approve QC
        public function qcApprove() {
            $tableName = 'quality_control';
            $this -> table = $this -> db -> $tableName;

            $doccode        = 'QC-APPR-'.$_POST['kodepinjam'];
            $tglapprove     = date('Y-m-d');
            $kodepinjam     = $_POST['kodepinjam'];
            $namapeminjam   = $_POST['namapeminjam'];
            $jmlpinjam      = $_POST['jmlpinjam'];
            $lamapinjam     = $_POST['lamapinjam'];
            $namaperush     = $_POST['namaperush'];
            $namadarurat    = $_POST['namadarurat'];
            $status         = '1';

            $insert = array("_id" => $doccode, "tglapprove" => $tglapprove, "kodepinjam" => $kodepinjam, "namapeminjam" => $namapeminjam, "jmlpinjam" => $jmlpinjam, "lamapinjam" => $lamapinjam, "namaperush" => $namaperush, "namadarurat" => $namadarurat, "status" => $status);
            $this -> table -> insert($insert);
        }

        //reject QC
        public function qcReject() {
            $tableName = 'quality_control';
            $this -> table = $this -> db -> $tableName;

            $doccode = 'QC-RJCT-'.$_POST['kodepinjam'];
            $tglapprove     = date('d-m-Y');
            $kodepinjam     = $_POST['kodepinjam'];
            $namapeminjam   = $_POST['namapeminjam'];
            $jmlpinjam      = $_POST['jmlpinjam'];
            $lamapinjam     = $_POST['lamapinjam'];
            $namaperush     = $_POST['namaperush'];
            $namadarurat    = $_POST['namadarurat'];
            $status         = '2';

            $insert = array("_id" => $doccode, "tglapprove" => $tglapprove, "kodepinjam" => $kodepinjam, "namapeminjam" => $namapeminjam, "jmlpinjam" => $jmlpinjam, "lamapinjam" => $lamapinjam, "namaperush" => $namaperush, "namadarurat" => $namadarurat, "status" => $status);
            $this -> table -> insert($insert);
        }

        //List Application Form
        function getCountApplikasi() {
            $tableName = 'application_form';
            $this -> table = $this -> db -> $tableName;

            $users = $this -> table -> find() -> count();// tes dikomen -> limit($limit);

            return $users;
        }

        //List Application Form
        function getCountApprove() {
            $tableName = 'quality_control';
            $this -> table = $this -> db -> $tableName;

            $cek = array('status' => '1');

            $users = $this -> table -> find($cek) -> count();// tes dikomen -> limit($limit);

            return $users;
        }

        //List Application Form
        function getCountReject() {
            $tableName = 'quality_control';
            $this -> table = $this -> db -> $tableName;

            $cek = array('status' => '2');

            $users = $this -> table -> find($cek) -> count();// tes dikomen -> limit($limit);

            return $users;
        }

        //List Application Form
        function getListApplikasi() {
            $tableName = 'applicant';
            $this -> table = $this -> db -> $tableName;

            $users = $this -> table -> find();// tes dikomen -> limit($limit);

            return $users;
        }

        //List Applicant Form
        function getListApplicant() {
            $tableName = 'applicant';
            $this -> table = $this -> db -> $tableName;

            $users = $this -> table -> find();// tes dikomen -> limit($limit);

            return $users;
        }

        //Cari Applikasi
        function getApplikasiByNo($kodepinjam) {
            $tableName = 'application_form';
            $this -> table = $this -> db -> $tableName;

            $query = array('kodepinjam' => $kodepinjam);

            $data = $this -> table -> findOne($query);

            return $data;
        }

        //Cari Applikasi
        function getApplicantByNo($kodepinjam) {
            $tableName = 'applicant';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            $data = $this -> table -> findOne($query);

            return $data;
        }

        //Cari Applikasi
        function getCompanyByNo($kodepinjam) {
            $tableName = 'company';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            $data = $this -> table -> findOne($query);

            return $data;
        }

        //Cari Applikasi
        function getEmergencyByNo($kodepinjam) {
            $tableName = 'emergency_cont';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            $data = $this -> table -> findOne($query);

            return $data;
        }

        //Cari Applikasi
        function getTenorByNo($kodepinjam) {
            $tableName = 'tenor';
            $this -> table = $this -> db -> $tableName;

            $query = array('_id' => $kodepinjam);

            $data = $this -> table -> findOne($query);

            return $data;
        }

        //delete aplikasi
        function deleteApplikasi($kodepinjam) {
            $tableName = 'application_form';
            $this -> table = $this -> db -> $tableName;

            $this -> table -> remove(array('kodepinjam' => $kodepinjam));
        }

        //delete aplikasi
        function deleteApplicant($kodepinjam) {
            $tableName = 'applicant';
            $this -> table = $this -> db -> $tableName;

            $this -> table -> remove(array('_id' => $kodepinjam));
        }

        //delete aplikasi
        function deleteEmergency($kodepinjam) {
            $tableName = 'emergency_cont';
            $this -> table = $this -> db -> $tableName;

            $this -> table -> remove(array('_id' => $kodepinjam));
        }

        //delete aplikasi
        function deleteCompany($kodepinjam) {
            $tableName = 'company';
            $this -> table = $this -> db -> $tableName;

            $this -> table -> remove(array('_id' => $kodepinjam));
        }

        //delete aplikasi
        function deleteTenor($kodepinjam) {
            $tableName = 'tenor';
            $this -> table = $this -> db -> $tableName;

            $this -> table -> remove(array('_id' => $kodepinjam));
        }
    }

    class seqNumber {
        var $mongo;
        var $db;
        var $table;

        //init
        public function __construct() {
            try {
                //Connect to Mongo
                $this -> mongo = new MongoClient('127.0.0.1:27017');

                $this -> db = $this -> mongo -> selectDB('298_Perbankan');

                $tableName = 'seq_form';
                $this -> table = $this -> db -> $tableName;
            } catch(Exception $e) {
                echo "Something Went Wrong.";
                exit();
            }
        }

        function getSeqNumber (){
            $sort = array('numtaken' => -1);
            /*$nextseqNum = $this -> table -> aggregate ( array
                    ( '$group' => 
                        array('_id' => 0,
                            'numtaken'=>array('$max'=>'$numtaken')
                        )
                    )
            );*/

            $nextseqNum = $this -> table -> find() -> sort($sort) -> limit(1);

            return $nextseqNum;
        }
    }
?>