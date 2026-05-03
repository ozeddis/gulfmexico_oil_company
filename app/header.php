<?php
  require "includes/phpmailer/PHPMailerAutoload.php";
  require "includes/functions.php";
?>
<?php
  if(isset($_SESSION['user_id'])){
    $query = "SELECT * FROM registration WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($_SESSION['user_id']));
    if($stmt->rowCount()==1){
      while($result = $stmt->fetch(PDO:: FETCH_ASSOC)){
        $user_id = $result['id'];
        $acc_id = $result['acc_id'];
        $last_name = $result['last_name']; 
        $first_name = $result['first_name'];
        $middle_name = $result['middle_name'];
        $email = $result['email'];
        $code = $result['referal'];
        $wallet = $result['wallet'];
        $who_refered = $result['who_refered'];
        $reg_date = $result['reg_date'];
        $country = $result['country'];
        $pin = $result['pin'];
        $password = $result['password'];
        $two_factor = $result['two_factor'];
        $password = $result['password'];
        $phone = $result['phone'];
        $status_ins = $result['status_ins'];
        $tax_status = $result['tax_status'];
        $trading_platform = $result['trading_platform'];
        $insurance_status = $result['insurance_status'];
        $mining_rate_status = $result['mining_rate_status'];
        $kyc_status = $result['kyc_status'];
        $kyc_docs = $result['kyc_documents'];
        $doc_type = $result['document_type'];

        if($who_refered !== "none"){
            $sql = " SELECT * FROM registration WHERE email = '{$who_refered}'";
            $query = mysqli_query($connect, $sql);
            $whox = 1;

            if(mysqli_num_rows($query) == 1){
                while($result = mysqli_fetch_assoc($query)){
                    $wallet_who = $result['wallet'];
                    $whos_name = $result['first_name'];
                    ++$whox;
                }
            }
        }else{
            $whos_name = "None";
            $whox = 0;
        }
    }
  }else{
    header("location:../../login");
  }
}
?>

<?php
	$query4 = " SELECT * FROM withdraw_from_wallet WHERE acc_id = '{$acc_id}' AND status = 'pending'";
	$run_query4 = mysqli_query($connect, $query4);
	$sum22 = 0;
	if(mysqli_num_rows($run_query4) > 0){
		while($result = mysqli_fetch_assoc($run_query4)){
			$sum22 += $result['amount'];
		}
	}

    $query5 = " SELECT * FROM withdraw_from_wallet WHERE acc_id = '{$acc_id}' AND status = 'active'";
	$run_query5 = mysqli_query($connect, $query5);
	$withdrawn = 0;
	if(mysqli_num_rows($run_query5) > 0){
		while($result = mysqli_fetch_assoc($run_query5)){
			$withdrawn += $result['amount'];
		}
	}

  	$earn = 0;
  	$query101 = "SELECT * FROM withdrawal WHERE email = '{$email}'";
  	$run_query101 = mysqli_query($connect, $query101);
  	if(mysqli_num_rows($run_query101) > 0){
  		while($result = mysqli_fetch_assoc($run_query101)){
  			$earn += $result['earnings'];
  		}
  	}

?>
<?php
	$credit = "credit";
	$debit = "debit";
	$query11 = " SELECT * FROM wallet WHERE wallet_address = '{$wallet}' AND status = '{$credit}'";
	$run_query11 = mysqli_query($connect, $query11);

	$amount = 0;
	while($result = mysqli_fetch_assoc($run_query11)){
		$amount += $result['amount'];
	}

	$query112 = " SELECT * FROM wallet WHERE wallet_address = '{$wallet}' AND status = '{$credit}' AND description = 'Referal Bonus'";
	$run_query112 = mysqli_query($connect, $query112);

	$ref_com = 0;
	while($result = mysqli_fetch_assoc($run_query112)){
		$ref_com += $result['amount'];
	}

	$amount2 = 0;
	$query111 = " SELECT * FROM wallet WHERE wallet_address = '{$wallet}' AND status = '{$debit}'";
	$run_query111 = mysqli_query($connect, $query111);
	while($result = mysqli_fetch_assoc($run_query111)){
		$amount2 += $result['amount'];
	}

	$account = ($amount - $amount2);

    $m = 0;
    $query = $conn->prepare("SELECT * FROM withdrawal WHERE acc_id = ? AND status = ?");
    $query->execute(array($acc_id, 'pending'));
    if($query->rowCount()>0){
        while($k = $query->fetch(PDO:: FETCH_ASSOC)){
            $m += $k['main_money'];
        }
    }

    $pending_deposit = 0;
    $query = $conn->prepare("SELECT * FROM wallet_deposit WHERE wallet_address = ? AND status = ?");
    $query->execute([$wallet, 'pending']);
    if($query->rowCount()>0){
        while($result = $query->fetch(PDO:: FETCH_ASSOC)){
            $pending_deposit += $result['amount'];
        }
    }
    $total_deposit = 0;
    $query = $conn->prepare("SELECT * FROM wallet_deposit WHERE wallet_address = ?");
    $query->execute([$wallet]);
    if($query->rowCount()>0){
        while($result = $query->fetch(PDO:: FETCH_ASSOC)){
            $total_deposit += $result['amount'];
        }
    }
?>

<?php
  if(isset($_POST['deposit'])){
    $amount = clean_str($_POST['amount']);
    $paymentMethod = clean_str($_POST['paymentMethod']);
  }
?>
<?php
 if(isset($_GET['logout'])){
   unset($_SESSION['user_id']);;
   header("location:../login");
 }
 if(empty($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
    header("location:../login");
 }
?>


<!DOCTYPE html>

<html lang="en">
<head>
        
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+00000000", // WhatsApp number
                    call_to_action: "", // Call to action
                    position: "left", // Position may be 'right' or 'left'
                };
                var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        <script type="text/javascript">
            var _smartsupp = _smartsupp || {};
            _smartsupp.key = '76158ab4358a00522c632dcb508e40b13b2eb5c6';
            window.smartsupp||(function(d) {
              var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
              s=d.getElementsByTagName('script')[0];c=d.createElement('script');
              c.type='text/javascript';c.charset='utf-8';c.async=true;
              c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
            })(document);
        </script>
		<meta charset="utf-8" />
		<title>Gulf Of Mexico Oil Platform</title>
		<meta name="description" content="No aside layout examples" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="gulfofmexicooilplatform.com" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="theme/html/demo1/dist/assets/plugins/global/plugins.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="theme/html/demo1/dist/assets/css/style.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="theme/html/demo1/dist/assets/css/themes/layout/header/base/light7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="theme/html/demo1/dist/assets/css/themes/layout/header/menu/light7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="theme/html/demo1/dist/assets/css/themes/layout/brand/light7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="theme/html/demo1/dist/assets/css/themes/layout/aside/dark7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="theme/html/demo1/dist/assets/css/pages/wizard/wizard-37b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="images/logo.png" />
       
        
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
		
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="dashboard">
				<img alt="Logo" src="images/logo.png" width="50px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0094689,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Logo-->
								<div class="header-logo">
									<a href="dashboard">
										<img alt="Logo" src="images/logo.png" width="50px"/>
									</a>
								</div>
								<!--end::Header Logo-->
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->
									<ul class="menu-nav">
										
                                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-active" aria-haspopup="true">
                                            <a href="dashboard" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Clothes/Briefcase.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000" />
                                                            <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text">Dashboard</span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="activity" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <i class="fas fa-clock"></i>
                                                </span>
                                                <span class="menu-text">Activity</span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="deposit" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
                                                    <i class="fa fa-money-bill-alt"></i>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text">Funding</span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="withdrawal" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <i class="fab fa-bitcoin"></i>
                                                </span>
                                                <span class="menu-text">Withdrawals</span>
                                            </a>
                                        </li>
                                        
                                        <!--<li class="menu-item" aria-haspopup="true">
                                            <a href="transfer" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <i class="fas fa-paper-plane"></i>
                                                </span>
                                                <span class="menu-text">Transfer Funds</span>
                                            </a>
                                        </li>-->
                                        
                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                            <a href="#" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <i class="fas fa-chart-area"></i>
                                                </span>
                                                <span class="menu-text">Investment</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                                <ul class="menu-subnav">
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="invest" class="menu-link">
                                                            <i class="fas fa-chart-area"><span></span></i>
                                                            
                                                            <span class="menu-text">Investment</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        
                                    <li class="menu-item" aria-haspopup="true">
                                            <a href="rewards" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <i class="fas fa-gem"></i>
                                                </span>
                                                <span class="menu-text">Referral</span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="settings" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <i class="far fa-sun"></i>
                                                </span>
                                                <span class="menu-text">Settings</span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="?logout" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <span class="menu-text">Log Out</span>
                                            </a>
                                        </li>
									</ul>
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->
							<div class="topbar">
								
								<div class="dropdown">
	
	
					</div>
					<div class="dropdown">
						
					</div>
				</div>
			</div>
			<!--end::Container-->
		</div>
		<!--end::Header-->
		<!--begin::Content-->
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			<!--begin::Subheader-->
			<div class="subheader py-2 py-lg-12 subheader-solid" id="kt_subheader">
				<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
					<!--begin::Info-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="width:120px; border:1px solid #ccc;background-color:#000;color:#fff; height:80px;">
						<br />
						<marquee behaviour="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start()">
							<span style='font-size:20px;'>Good Day <?php echo "{$first_name} {$last_name}"; ?></span>						
						</marquee>
						<br />
					</div>
				</div>
			</div>
					