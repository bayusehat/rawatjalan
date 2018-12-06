<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/img/hospital.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistem Informasi Rawat Jalan</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url();?>assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>assets/css/themify-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style type="text/css">
        body{
            max-width: 100%;
        }
        .modal-backdrop.in{
            z-index: 1;
        }
        #asuransi{
            display: none;
        }
        #autoSuggestionsList > li {
            background: none repeat scroll 0 0 #F3F3F3;
            border-bottom: 1px solid #E3E3E3;
            list-style: none outside none;
            padding: 3px 15px 3px 15px;
            text-align: left;
        }
        .auto_list {
            border: 1px solid #E3E3E3;
            border-radius: 5px 5px 5px 5px;
            position: absolute;
            z-index: 1;
            width: 100%;
        }
        .form-barang{
            background: transparent;
            width: 100%;
            border: none;
        }
        .scroll{
            height: 250px;
            overflow-y: scroll;
            margin: 10px 0 10px 0;
        }
    </style>
    <script type="text/javascript">
       $.noConflict();
        jQuery(document).ready(function ($) {
            $(".tgl").datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                   <i><img src="<?php echo base_url();?>assets/img/hospital-lg.png" style="width:30px;height:30px"></i> Rawat Jalan
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo base_url();?>index.php/admin">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/admin/data_pasien">
                        <i class="ti-user"></i>
                        <p>Data Pasien</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/admin/data_rawat_jalan">
                        <i class="ti-view-list-alt"></i>
                        <p>Data Rawat Jalan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/admin/data_pembayaran">
                        <i class="ti-text"></i>
                        <p>Data Pembayaran</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/admin/data_dokter">
                        <i class="ti-pin"></i>
                        <p>Data Dokter</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sistem Informasi Rawat Jalan</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!-- <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul> -->

                </div>
            </div>
        </nav>


        <div class="content">
            <?php
                $this->load->view($main_view);
            ?>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <!-- <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul> -->
                </nav>
                <div class="copyright pull-right">
                   
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url();?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="<?php echo base_url();?>text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url();?>assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url();?>assets/js/demo.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript">

        $(document).ready(function() {
            $('.tb').DataTable();
        } );
	</script>

</html>
