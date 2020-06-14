<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href=" assets/css/metro-bootstrap.css" rel="stylesheet">
        <!-- <link href="assets/css/metro-bootstrap-responsive.css" rel="stylesheet">-->
        <link href="assets/css/docs.css" rel="stylesheet">

        <!-- Metro UI CSS JavaScript plugins -->
        <!--  <script src=" assets/js/load-metro.js"></script> -->

        <!-- Local JavaScript  -->
        <script src="assets/js/docs.js"></script>
        <script>
            $(document).ready(function() {
                $("#form1").validate();
            });
        </script>
        <!-- style -->
        <style type="text/css">
           label.error {
                    color: red;
                }
        </style>
        <!-- misc -->
        <title>Bank XYZ</title>
    </head>
    <body class="metro">
        <!-- navi -->
        <div class="navigation-bar">
            <div class="navigation-bar-content container">
                <a href="index.php" class="element" style="width: 220px">SISTEM PERBANKAN <sup>1.0</sup></a>
                <span class="element-divider"></span>
            </div>
        </div>
        <!-- content -->
        <div class="container">
            <h1>
                <!-- <a href="/"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                Forms<small class="on-right">definition</small> -->
            </h1>

            <div class="grid">
                <div class="row">
                    <div class="span3 no-tablet-portrait" style="width: 200px">
                        <nav>
                            <ul class="side-menu" style="border: 0px">
                            <li>
                                <a href="index.php?mod=xyz&pg=appl_view">Entry Data</a>
                            </li>
                            <li>
                                <a href="index.php?mod=xyz&pg=qc_view">Quality Control</a>
                            </li>
                            <li>
                                <a href="index.php?mod=xyz&pg=rep">Report</a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="span9">
                    <?php  
                        $pg = '';
            			/*
            			 * PHP Code untuk mendapatkan halaman view masing masing tabel
            			 */
            			if (!isset($_GET['pg'])) {
            			 	include('xyz/appl_view.php');
            			} else {
            				$pg = $_GET['pg'];
            				$mod = $_GET['mod'];
            				include $mod . '/' . $pg . ".php";
            			}
            	    ?>   
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>