
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Gulf Mexico Oil Platform </title>

    <link rel="apple-touch-icon" sizes="180x180" href="../img/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- fonts -->
    <link rel="stylesheet" href="fonts/md-fonts/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="libs/animate.css/animate.min.css">
	 <link rel="stylesheet" href="libs/tables-datatables/dist/datatables.min.css">
     <!-- jquery-loading -->
     <link rel="stylesheet" href="libs/jquery-loading/dist/jquery.loading.min.css">
    <!-- Nasdaqq main style -->
    <link id="pageStyle" rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="libs/animate.css/animate.min.css">

</head><body class="app sidebar-fixed aside-menu-off-canvas aside-menu-hidden header-fixed ">
    <header class="app-header navbar">
        <div class="hamburger hamburger--arrowalt-r navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
        <!-- end hamburger -->
        <a class="navbar-brand" href="admin_page.php">
            <strong>Gulf Mexico Oil Platform</strong>
        </a>

        <div class="hamburger hamburger--arrowalt-r navbar-toggler sidebar-toggler d-md-down-none mr-auto">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
       <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
    </header>
    <!-- end header -->

    <div class="app-body">
        <div class="sidebar" id="sidebar">
            <nav class="sidebar-nav" id="sidebar-nav-scroller">
                <ul class="nav">
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link " href="admin_page.php?p=dashboard">
                            <i class="mdi mdi-gauge"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-title">Actions</li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-lock"></i> Password</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_page.php?p=change_password"> Change Password</a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-spinner"></i> Admin</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_page.php?p=add_admin"> Add Admin</a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-users"></i> Members</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_page.php?p=members"> Manage Members</a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-credit-card"></i> Deposit</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_page.php?p=pending_deposit"> Pending Deposit</a>
                            </li>

                        </ul>
                    </li>
					<li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-money"></i> Withdrawal</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_page.php?p=pending_withdrawal"> Pending Withdrawal</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="mdi mdi-book-open-page-variant"></i> KYC</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_page.php?p=kyc_approval"> Approve KYC</a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-cog"></i> Contracts</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_page.php?p=active_contracts"> Active Contracts</a>
                            </li>
                        </ul>
                    </li>

					<li class="nav-item nav-dropdown">
                        <a class="nav-link " href="admin_page.php?p=plans">
                            <i class="fa fa-edit"></i> Edit Plans
                        </a>
                    </li>
                    <li class="nav-item nav-dropdown">
                                  <a class="nav-link " href="admin_page.php?p=proof">
                                      <i class="fa fa-edit"></i> Generate Proof
                                  </a>
                              </li>
					<li class="nav-item nav-dropdown">
                        <a class="nav-link " href="admin_page.php?p=logout">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <main class="main">

<ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
                <li class="breadcrumb-item ">
                    <a href="client_mining.php">Home</a>
                </li>

                <li class="breadcrumb-item active">Dashboard</li>

            </ol>

		<br>
            <div class="container-fluid">

                <div class="animated fadeIn">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="ecom-widget-chart-full">
                                <div class="chart-full-header">
                                    <div class="header-text">
                                        <div class="heading">Gulf Mexico Oil Platform </div>
                                    </div>


                                    <div class="ecom-widget-chart-text text-center">
									91</div>
                                    <div class="chart-full-period text-center">Investors </div>
                                    <canvas class="chart-full-canvas" id="canvas-full-chart-light"></canvas>
                                </div>
                            </div>
                            <!-- end ecom-widget-chart-full -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class=" row row-margin-up">

                        <!-- end col -->
                        <div class="col-md-4 ">
                            <div class="card ecom-widget-sales">
                                <div class="card-body">
                                    <div class="ecom-sales-icon text-center">
                                        <i class="mdi mdi-currency-usd"></i>
                                    </div>
                                    <!-- end ecom-sales-icon -->
                                    <h5 class="text-center">DEPOSITS</h5>

                                    <ul>
                                        <li>Approved
                                            <span>
												173834.25 USD
											</span>
                                        </li>
                                        <li>Pending Approval
                                            <span>
												710 USD
											</span>
                                        </li>
                                        <li>Total
                                            <span>174544.25 USD</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ecom-widget-sales -->
                        </div>
                        <!-- end col -->

                        <div class="col-md-4 ">
                            <div class="card ecom-widget-sales">
                                <div class="card-body">

                                    <div class="ecom-sales-icon text-center">
                                        <i class="mdi mdi-cube-outline"></i>
                                    </div>
                                    <!-- end ecom-sales-icon -->
                                    <h5 class="text-center">WITHDRAWAL</h5>
                                    <ul>
                                        <li>Pending Payment
                                            <span>
												122000 USD
											</span>
                                        </li>
                                        <li>Approved
                                            <span>
												430033.165648 USD
											</span>
                                        </li>
                                        <li>Total Sum
                                            <span>552033.165648 USD</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end ecom-widget-sales  -->
                        </div>
                        <!-- end col -->

                        <div class="col-md-4">
                            <div class="card ecom-widget-sales">
                                <div class="card-body">

                                    <div class="ecom-sales-icon text-center">
                                        <i class="mdi mdi-fingerprint"></i>
                                    </div>
                                    <!-- end ecom-sales-icon -->
                                    <h5 class="text-center">CONTRACTS</h5>
                                    <ul>
                                        <li>On-Going Contracts
                                            <span>
												564 USD
											</span>
                                        </li>
                                        <li> Paused Contract
                                            <span>
												883 USD
											</span>
                                        </li>
                                        <li> Completed Contract
                                            <span>
												0 USD
											</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end  ecom-widget-sales -->
                        </div>
                        <!-- end col -->
                    </div>

                    <!-- end row -->
                </div>
                <!-- end animated fadeIn -->
            </div>        </main>


    </div>
    <!-- end app-body -->

    <footer class="app-footer">
         2022 &copy; ZenFirm
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="libs/bootstrap/bootstrap.min.js"></script>
    <script src="libs/PACE/pace.min.js"></script>
    <script src="libs/chart.js/dist/Chart.min.js"></script>
    <script src="libs/nicescroll/jquery.nicescroll.min.js"></script>

    <script src="libs/jquery-knob/dist/jquery.knob.min.js"></script>

    <!--morris js -->
    <script src="libs/raphael/raphael.min.js"></script>
    <script src="libs/charts-morris-chart/morris.min.js"></script>

    <!-- jquery-loading -->
    <script src="libs/jquery-loading/dist/jquery.loading.min.js"></script>
    <!-- octadmin Main Script -->
    <script src="js/app.js"></script>

    <!-- dashboard-ecom script -->
    <script src="js/dashboard-ecom-widgets.js"></script>
	<script src="libs/tables-datatables/dist/datatables.min.js"></script>

    <script src="js/table-datatable-example.js"></script>

    <!-- dropify -->
    <script src="libs/dropify/dist/js/dropify.min.js"></script>

    <!-- dropify examples -->
    <script src="js/dropify-examples.js"></script>
	<script src="libs/form-masks/dist/formatter.min.js"></script>
    <script src="js/form-masks-example.js"></script>
	<script>
		$(document).ready(function (){
			$("#fury_btn").click(function(){
				var amount_entered = $("#price").val();
				var cofee = $("#max_fury").val();
				var meat = $("#min_fury").val();
				var contract_plan = $("#plan_fury").val();

				var dataString = 'contract_cost='+ amount_entered + '&plan='+ contract_plan;

				if( amount_entered < 50000){
					$("#fury_result").html("The amount entered is below the range of this contract");
					var mini = 0;
				}else{
					var mini = 1;
				}

				if( amount_entered > 500000){
					$("#fury_result").html(" The amount entered is beyond the range of this contract");
					var maxi = 0;
				}else{
					var maxi = 1;
				}

				var mentor = mini + maxi;

				if(mentor == 2){
					$.ajax({
						type: "POST",
						url: "contract.php",
						data:dataString,
						cache: false,
						success:function(result){
							window.location.replace("admin_page.php?p=contract_processing");
						}
					});
				}
				return false;
			});
		});
	</script>
	<script>
		$(document).ready(function (){
			$("#basic_btn").click(function(){
				var current_amount = $("#amount").val();
				var cofee = $("#max_basic").val();
				var meat = $("#min_basic").val();
				var measure_plan = $("#plan_basic").val();

				var dataString = 'contract_cost='+ current_amount + '&plan='+ measure_plan;

				if( current_amount < 3000){
					$("#basic_result").html("The amount entered is below the range of this contract");
					var mini = 0;
				}else{
					var mini = 1;
				}

				if( current_amount > 49999){
					$("#basic_result").html(" The amount entered is beyond the range of this contract");
					var maxi = 0;
				}else{
					var maxi = 1;
				}

				var mentor = mini + maxi;

				if(mentor == 2){
					$.ajax({
						type: "POST",
						url: "contract.php",
						data:dataString,
						cache: false,
						success:function(result){
							window.location.replace("admin_page.php?p=contract_processing");
						}
					});
				}
				return false;
			});
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#search").keyup(function(){
			var searchText = $(this).val();
			if(searchText != ''){
				$.ajax({
					url:'action.php',
					method: 'POST',
					data:{query: searchText},
					success:function(response){
						$("#show-list").html(response);
					}
				});
			}else{
				$("#show-list").html('');
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#tracking_check").keyup(function(){
			var searchText = $(this).val();
			if(searchText != ''){
				$.ajax({
					url:'tracking.php',
					method: 'POST',
					data:{query: searchText},
					success:function(response){
						$("#show-list-tracking").html(response);
					}
				});
			}else{
				$("#show-list-tracking").html('');
			}
		});
	});
</script>
</body>

</html>
