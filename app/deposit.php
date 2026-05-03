<?php 
	require "header.php";
?>
	
				<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
	<!--begin::Mixed Widget 1-->
	<div class="card card-custom bg-gray-100 card-stretch gutter-b">
		<!--begin::Header-->
		<div class="card-header border-0 bg-danger py-5">
			<div class="card-toolbar">
				<div class="dropdown dropdown-inline">
									</div>
			</div>
		</div>
		<!--end::Header-->
		<!--begin::Body-->
		<div class="card-body p-0 position-relative overflow-hidden">
			<!--begin::Chart-->
			<div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 100px"></div>
			<!--end::Chart-->
			<!--begin::Stats-->
			<div class="card-spacer mt-n25">
            <h1 style="color: white;">DEPOSIT</h1>
				<!--begin::Row-->
				<div class="row m-0">
					<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 text-center">
						<a data-toggle="modal" data-target="#exampleModal"><span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
							<img src="images/bitcoin.png" alt="" width="100px" >
						</span></a>
					</div>
					<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 text-center">
						<a data-toggle="modal" data-target="#exampleModal1"><span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
							<img src="images/eth.jpg" alt="" width="100px" >
						</span></a>
					</div>
					<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 text-center">
						<a data-toggle="modal" data-target="#exampleModal2"><span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
							<img src="images/USDT.png" alt="" width="100px" >
						</span></a>
					</div>
					
					
					<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 text-center">
						<a data-toggle="modal" data-target="#exampleModal3"><span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
							<img src="images/TRX.svg" alt="" width="100px" >
						</span></a>
					</div>
					<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 text-center">
						<a data-toggle="modal" data-target="#exampleModal4"><span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
							<img src="images/SOL.svg" alt="" width="100px" >
						</span></a>
					</div>
					<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 text-center">
						<a data-toggle="modal" data-target="#exampleModal5"><span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
							<img src="images/PI.jpg" alt="" width="100px" >
						</span></a>
					</div>
				</div>
			</div>
			<!--end::Stats-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Mixed Widget 1-->
</div>
<div class="col-md-2"></div>
</div>
<!-- BTC Modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form class="deposit_form" action="deposit_now.php" method="POST">
			<div class="modal-content">
				<div class="modal-body">
					<label>Amount (USD)</label>
					<input type="text" name="amount" value="" class="amount form-control" Placeholder="Enter deposit amount" required>
					<input type="hidden" name="currency" value="BTC" class="currency form-control">
					<input type="hidden" name="email" class="form-control" value="<?php echo $email;?>">
					<input type="hidden" name="acc_id" class="form-control" value="<?php echo $acc_id;?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary font-weight-bold" name="btc_btn">Deposit</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="deposit_now.php" class='deposit_form' method="POST">
            
			<div class="modal-content">
				<div class="modal-body">
					<label>Amount (USD)</label>
                    
					<input type="text" id="amount" name="amount" value="" class="form-control" Placeholder="Enter deposit amount" required>
					<input type="hidden" id="currency" name="currency" value="ETH" class="form-control">
					<input type="hidden" id="" name="email" class="form-control" value="<?php echo $email;?>">
					<input type="hidden" name="acc_id" class="form-control" value="<?php echo $acc_id;?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary font-weight-bold" name="eth_btn">Deposit</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form class="deposit_form" action="deposit_now.php" method="POST">
			<div class="modal-content">
				<div class="modal-body">
					<label>Amount (USD)</label>
					<input type="text" name="amount" value="" class="amount form-control" Placeholder="Enter deposit amount" required>
					<input type="hidden" name="currency" value="USDT" class="currency form-control">
					<input type="hidden" name="email" class="form-control" value="<?php echo $email;?>">
					<input type="hidden" name="acc_id" class="form-control" value="<?php echo $acc_id;?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary font-weight-bold" name="usdt_btn">Deposit</button>
				</div>
			</div>
		</form>
	</div>
</div>	
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="deposit_now.php" class='deposit_form' method="POST">
            
			<div class="modal-content">
				<div class="modal-body">
					<label>Amount (USD)</label>
                    
					<input type="text" id="amount" name="amount" value="" class="form-control" Placeholder="Enter deposit amount" required>
					<input type="hidden" id="currency" name="currency" value="TRX" class="form-control">
					<input type="hidden" id="" name="email" class="form-control" value="<?php echo $email;?>">
					<input type="hidden" name="acc_id" class="form-control" value="<?php echo $acc_id;?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary font-weight-bold" name="eth_btn">Deposit</button>
				</div>
			</div>
		</form>
	</div>
</div>	
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="deposit_now.php" class='deposit_form' method="POST">
            
			<div class="modal-content">
				<div class="modal-body">
					<label>Amount (USD)</label>
                    
					<input type="text" id="amount" name="amount" value="" class="form-control" Placeholder="Enter deposit amount" required>
					<input type="hidden" id="currency" name="currency" value="SOL" class="form-control">
					<input type="hidden" id="" name="email" class="form-control" value="<?php echo $email;?>">
					<input type="hidden" name="acc_id" class="form-control" value="<?php echo $acc_id;?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary font-weight-bold" name="eth_btn">Deposit</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="deposit_now.php" class='deposit_form' method="POST">
            
			<div class="modal-content">
				<div class="modal-body">
					<label>Amount (USD)</label>
                    
					<input type="text" id="amount" name="amount" value="" class="form-control" Placeholder="Enter deposit amount" required>
					<input type="hidden" id="currency" name="currency" value="PI" class="form-control">
					<input type="hidden" id="" name="email" class="form-control" value="<?php echo $email;?>">
					<input type="hidden" name="acc_id" class="form-control" value="<?php echo $acc_id;?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary font-weight-bold" name="eth_btn">Deposit</button>
				</div>
			</div>
		</form>
	</div>
</div>
					
					
				</div>
			</div>
		</div>
		<!-- begin:: Jquery Lib -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
        <!-- end:: Jquery Lib -->
 		
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#348748", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		
		<script src="theme/html/demo1/dist/assets/plugins/global/plugins.bundle7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/scripts.bundle7b4a.js?v=7.1.0"></script>
		
		<script src="theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle7b4a.js?v=7.1.0"></script>
		
		<script src="theme/html/demo1/dist/assets/js/pages/widgets7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/pages/crud/forms/validation/form-widgets7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/plugins/custom/datatables/datatables.bundle7b4a.js?v=7.1.0"></script>
		
		<script src="theme/html/demo1/dist/assets/js/pages/crud/datatables/data-sources/html7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/pages/custom/wizard/wizard-37b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/plugins/global/plugins.bundle7b4a.js?v=7.1.0"></script>
		
		 
</body>
</html>