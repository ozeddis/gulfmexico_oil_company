<?php 
	require "header.php";

?>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-3">
		<div class="card card-custom gutter-b">
			<div class="card-header">
				<div class="card-title">
					<h2 class="card-label">All activities</h2>
				</div>
			</div>
			<div class="card-body">
				<!--begin::Example-->
				<div class="example">
					<div class="example-preview">
						<div class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block" role="alert" id="deposit">
							<div class="alert-text">Deposits</div>
						</div>
						<div class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block" role="alert" id="withdrawal">
							<div class="alert-text">Withdrawal</div>
						</div>
						<div class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block" role="alert" id="investment">
							<div class="alert-text">Investment</div>
						</div>
						
					</div>
				</div>
				<!--end::Example-->
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div id="deposit_div">
			<form action="" method="POST">
			
						<div class='card card-custom'>
							<div class='card-header'>
								<div class='card-title'>
									<span class='card-icon'>
										<i class='flaticon2-favourite text-primary'></i>
									</span>
									<h3 class='card-label'>Deposit History</h3>
								</div>
								<div class='card-toolbar'>
									
								</div>
							</div>
							<div class='card-body table-responsive'>
								<!--begin: Datatable-->
								<table class='table table-bordered table-hover table-checkable' id='kt_datatable' style='margin-top: 13px !important'>
									<thead>
										<tr>
											<th>S/N</th>
											<th>Amount</th>
											<th>Transaction ID</th>
											<th>Status</th>
											<th>Transaction Date</th>
											<th>Mode of Payment</th>
										</tr>
									</thead>
									<?php 
										$total_deposit = 0;
										$query = $conn->prepare("SELECT * FROM wallet_deposit WHERE wallet_address = ?");
										$query->execute([$wallet]);
										$i = 0;
										if($query->rowCount()>0){
											while($result = $query->fetch(PDO:: FETCH_ASSOC)){
												$total_deposit += $result['amount'];
												$transaction_id = $result['transaction_id'];
												$status = $result['status'];
												$date = $result['date'];
												$time = $result['time'];
												$modeofPayment = $result['mode_of_payment'];

												echo "
													<tbody>
														<tr>
															<td>".++$i."</td>
															<td>$total_deposit USD</td>
															<td>$transaction_id</td>
															<td>$status</td>
															<td>$date $time</td>
															<td>$modeofPayment</td>
														</tr>
													</tbody>
												";
												
											}
										}else{
											echo "
											<tr>
												<td colspan='6' class='dataTables_empty' valign='top'>No matching records found</td>
											</tr>";
										}
									?>
								</table>
								<a href='deposit'><button type='button' class='btn btn-danger font-weight-bold px-6 py-3' name=''>Make Deposit</a>
							</div>
						</div>
						<br><br>
								</form>
		</div>
		<div id="withdraw_div" style="display:none;">
			<form action="" method="POST">
			
			<div class='card card-custom'>
				<div class='card-header'>
					<div class='card-title'>
						<span class='card-icon'>
							<i class='flaticon2-favourite text-primary'></i>
						</span>
						<h3 class='card-label'>Withdrawal History</h3>
					</div>
					<div class='card-toolbar'>
						
					</div>
				</div>
				<div class='card-body table-responsive'>
					<!--begin: Datatable-->
					<table class='table table-bordered table-hover table-checkable' id='kt_datatable' style='margin-top: 13px !important'>
						<thead>
							<tr>
								<th class="text-nowrap text-left text-md-center sorting_desc" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 147px;" aria-sort="descending" aria-label="Transaction ID: activate to sort column ascending">Transaction ID</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 147px;" aria-label="Date and Time: activate to sort column ascending">Date and Time</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 113px;" aria-label="Requestedamount: activate to sort column ascending">Requested<br>amount</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 102px;" aria-label="Approvedamount: activate to sort column ascending">Receiving Address</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 97px;" aria-label="Currency: activate to sort column ascending">Currency</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 75px;" aria-label="Status: activate to sort column ascending">Status</th>

							</tr>
						</thead>
						<tbody>
							<?php
								$query = " SELECT * FROM withdraw_from_wallet WHERE wallet_address = '{$wallet}'";
								$run_query = mysqli_query($connect, $query);
								$x = 1;
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$user_id = $result['id'];
										$mb_wallet = $result['mb_wallet'];
										$amount = $result['amount'];
										$date = $result['date'];
										$time = $result['time'];
										$status = $result['status'];
										$transaction_id = $result['transaction_id'];
										
										echo "
											<tr>
												<td class='text-center'>$transaction_id</td>
												<td class='text-center'>{$date} {$time}</td>
												<td class='text-center'>$".number_format(($amount),2)."</td>
												<td class='text-center'>$mb_wallet</td>
												<td class='text-center'>USD</td>
												<td class='text-center'>$status</td>
											</tr>
										";
									$x++;
									}
								}else{
									echo "
										<tr>
											<td colspan='6' class='dataTables_empty' valign='top'>No matching records found</td>
										</tr>";
								}
							?>
						
					</tbody>
					</table>
					<a href='deposit'><button type='button' class='btn btn-danger font-weight-bold px-6 py-3' name=''>Withdraw Now</a>
				</div>
			</div>
			<br><br>
					</form>

		</div>
		<div id="investment_div" style="display:none;">
		<form action="" method="POST">
			
			<div class='card card-custom'>
				<div class='card-header'>
					<div class='card-title'>
						<span class='card-icon'>
							<i class='flaticon2-favourite text-primary'></i>
						</span>
						<h3 class='card-label'>Investment History</h3>
					</div>
					<div class='card-toolbar'>
						
					</div>
				</div>
				<div class='card-body table-responsive'>
					<!--begin: Datatable-->
					<table class='table table-bordered table-hover table-checkable' id='kt_datatable' style='margin-top: 13px !important'>
						<thead>
							<tr>
								<th class="text-nowrap text-left text-md-center sorting_desc" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 147px;" aria-sort="descending" aria-label="Transaction ID: activate to sort column ascending">Transaction ID</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 147px;" aria-label="Date and Time: activate to sort column ascending">Start Date</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 147px;" aria-label="Plan">Plan</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 113px;" aria-label="Investment Amount">Investment<br>amount (USD)</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 102px;" aria-label="Approvedamount: activate to sort column ascending">End Date</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 97px;" aria-label="Currency: activate to sort column ascending">Duration</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 75px;" aria-label="Status: activate to sort column ascending">Trade Progress</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 75px;" aria-label="Status: activate to sort column ascending">Earnings (USD)</th>
								<th class="text-nowrap sorting" tabindex="0" aria-controls="transactions" rowspan="1" colspan="1" style="width: 75px;" aria-label="Status: activate to sort column ascending">Status</th>

							</tr>
						</thead>
						<tbody>
							<?php
								$query = " SELECT * FROM withdrawal WHERE acc_id = '{$acc_id}' ORDER BY id DESC";
								$run_query = mysqli_query($connect, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$with_id = $result['id'];
										$start_date = $result['start_date'];
										$bundle = $result['bundle'];
										$plan = $result['plan'];
										$transaction_id = $result['transaction_id'];
										$main_money = $result['main_money'];
										$no_of_times = $result['no_of_times'];
										$amount_per_time = $result['amount_per_time'];
										$duration = $result['duration'];
										$times_done = $result['times_done'];
										$earnings = $result['earnings'];
										$status = $result['status'];
										$trigger = $result['triger'];
										
										if($status == "pending" && $trigger == "start"){
											$check = "Active Trade";
										}elseif($status == "pending" && $trigger == ""){
										    $check = "Pending Approval";
										}else{
											$check = "Trade Completed";
										}
										
										$startdate = strtotime("$start_date");
										$add_year = strtotime("+$duration",$startdate);
										$new_date = date("Y-m-d", $add_year);
										
										echo "<tr>
												<td class='text-center'>$transaction_id</td>
												<td class='text-center'>$start_date</td>
												<td class='text-center'>$plan</td>
												<td class='text-center'>$".number_format(($main_money),2)."</td>
												<td class='text-center'>$new_date</td>
												<td class='text-center'>$duration</td>
												<td class='text-center'>$times_done of $no_of_times</td>
												<td class='text-center'>$".number_format(($earnings),2)."</td>
												<td class='text-center'>$check</td>
												</tr>
										";
									}
								}else{
									echo "You have no Order";
								}
							?>
						</tbody>
					</table>
					<a href='withdraw'><button type='button' class='btn btn-danger font-weight-bold px-6 py-3' name=''>Withdraw Now</a>
				</div>
			</div>
			<br><br>
					</form>
		</div>
		
	</div>
	<div class="col-md-1"></div>
</div>
	
					
					
					
				</div>
			</div>
		</div>
		
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		
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
		<script>
		$(document).ready(function (){
			$("#first_btn").click(function(){
				var name = $("#fullname").val();
				var resident = $("#address").val();
				var phone = $("#number").val();
				var dob = $("#kt_datepicker_2").val();
				
				if(name == ''){
					$("#result1").html("Fullname is required");
				}else if(resident == ''){
					$("#result2").html("Residential address is required");
				}else if(phone == ''){
					$("#result3").html("Contact Phone number is required");
				}else if(dob == ''){
					$("#result4").html("Date of birth is required");
				}else{
					$('#first_div').hide();
					$('#second_div').show();
					$('#third_div').hide();
					$('#fourth_div').hide();
					$('#fifth_div').hide();
				}
			});
		});
		
		$(document).ready(function (){
			$("#password_btn").click(function(){
				var current_password = $("#cpassword").val();
				var new_password = $("#npassword").val();
				var password_confirm = $("#confirm").val();
				var old_password = $("#password").val();
				var identity = $("#acc").val();
				
				var dataString = '&npas='+ new_password + '&id_conc='+ identity;
				
				if(current_password == ''){
					$("#result1").html("<span style='color:red;'>Current Password can not be empty</span>");
				}else if(new_password == ''){
					$("#result1").html("<span style='color:red;'>New password cannot be empty</span>");
				}else if(password_confirm == ''){
					$("#result1").html("<span style='color:red;'>Confirm Password is required</span>");
				}else if(current_password != old_password){
					$("#result1").html("<span style='color:red;'>Wrong current password</span>");
				}else if(new_password != password_confirm){
					$("#result1").html("<span style='color:red;'>Passwords does not match</span>");
				}else{
					$.ajax({
							type: "POST",
							url: "password_change.php",
							data:dataString,
							cache: false,
							success:function(result){
								$("#result1").html(result);
							}
						});
				}
			});
		});
		
		$(document).ready(function (){
			$("#fa_btn").click(function(){
				var fname = $("#fa_btn").val();
				var fid = $("#acc_id").val();
				var dataString = '&type='+ fname + '&acc_id='+ fid;
				
				$.ajax({
					type: "POST",
					url: "fa_page.php",
					data:dataString,
					cache: false,
					success:function(result){
						$("#result3").html(result);
					}
				});
			});
		});
		
		$(document).ready(function (){
			$("#profile_btn").click(function(){
				var fname = $("#fullname").val();
				var date = $("#dob").val();
				var cphone = $("#phone").val();
				var num_social = $("#social_num").val();
				var resident = $("#address").val();
				var nation = $("#country").val();
				var code = $("#zip_code").val();
				var sex = $("#gender").val();
				var aka_id = $("#acc_id").val();
				
				var dataString = '&legal='+ fname + '&date_of_birth='+ date + '&number='+ cphone + '&social_num='+ num_social + '&address='+ resident + '&country='+ nation + '&zip_code='+ code + '&gender='+ sex + '&acc_id='+ aka_id;
				
				$.ajax({
					type: "POST",
					url: "security.php",
					data:dataString,
					cache: false,
					success:function(result){
						$("#result2").html(result);
					}
				});
			});
		});
		
		$(document).ready(function (){
			$("#second_btn").click(function(){
				var intend = $("#intention").val();
				
				if(intend == ''){
					$("#result5").html("Purpose of Investment is required");
				}else{
					$('#first_div').hide();
					$('#second_div').hide();
					$('#third_div').show();
					$('#fourth_div').hide();
					$('#fifth_div').hide();
				}
			});
		});
		$(document).ready(function (){
			$("#third_btn").click(function(){
				var flier = $("#income").val();
				
				if(flier == ''){
					$("#result6").html("Your income is required");
				}else{
					$('#first_div').hide();
					$('#second_div').hide();
					$('#third_div').hide();
					$('#fourth_div').show();
					$('#fifth_div').hide();
				}
			});
		});
		$(document).ready(function (){
			$("#fourth_btn").click(function(){
				var course = $("#savings").val();
				
				if(course == ''){
					$("#result7").html("Your Savings is required");
				}else{
					$('#first_div').hide();
				$('#second_div').hide();
				$('#third_div').hide();
				$('#fourth_div').hide();
				$('#fifth_div').show();
				}
			});
		});
		
		$(document).ready(function (){
			$("#image_id").click(function(){
				alert("This option is inactive for this user.");
			});
		});
		
		$(document).ready(function (){
			$("#saving_account_btn").click(function(){
				$('#saving_div').show();
				$('#personal_div').hide();
				$('#joint_div').hide();
				$('#roth_div').hide();
				$('#sep_div').hide();
				$('#trad_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#personal_account_btn").click(function(){
				$('#saving_div').hide();
				$('#personal_div').show();
				$('#joint_div').hide();
				$('#roth_div').hide();
				$('#sep_div').hide();
				$('#trad_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#roth_account_btn").click(function(){
				$('#saving_div').hide();
				$('#personal_div').hide();
				$('#joint_div').hide();
				$('#roth_div').show();
				$('#sep_div').hide();
				$('#trad_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#joint_account_btn").click(function(){
				$('#saving_div').hide();
				$('#personal_div').hide();
				$('#joint_div').show();
				$('#roth_div').hide();
				$('#sep_div').hide();
				$('#trad_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#sep_account_btn").click(function(){
				$('#saving_div').hide();
				$('#personal_div').hide();
				$('#joint_div').hide();
				$('#roth_div').hide();
				$('#sep_div').show();
				$('#trad_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#trad_account_btn").click(function(){
				$('#saving_div').hide();
				$('#personal_div').hide();
				$('#joint_div').hide();
				$('#roth_div').hide();
				$('#sep_div').hide();
				$('#trad_div').show();
			});
		});
		
		$(document).ready(function (){
			$("#crypto").click(function(){
				$('#cryptocurrency').show();
				$('#perfect').hide();
				$('#bnb_match').hide();
				$('#usdt_match').hide();
			});
		});
		
		$(document).ready(function (){
			$("#perfect_money").click(function(){
				$('#cryptocurrency').hide();
				$('#perfect').show();
				$('#bnb_match').hide();
				$('#usdt_match').hide();
			});
		});
		
		$(document).ready(function (){
			$("#perfect_money").click(function(){
				$('#lever').hide();
				$('#perfect').show();
				$('#bnb_match').hide();
				$('#usdt_match').hide();
			});
		});
		
		$(document).ready(function (){
			$("#leverage").click(function(){
				$('#lever').show();
				$('#perfect').hide();
				$('#bnb_match').hide();
				$('#usdt_match').hide();
			});
		});
		
		$(document).ready(function (){
			$("#usdt").click(function(){
				$('#cryptocurrency').hide();
				$('#perfect').hide();
				$('#bnb_match').hide();
				$('#usdt_match').show();
			});
		});
		
		$(document).ready(function (){
			$("#watch").click(function(){
				$('#cryptocurrency').hide();
				$('#perfect').hide();
				$('#bnb_match').show();
			});
		});
		
		$(document).ready(function (){
			$("#deposit").click(function(){
				$('#deposit_div').show();
				$('#withdraw_div').hide();
				$('#investment_div').hide();
				$('#sales_div').hide();
				$('#trading_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#withdrawal").click(function(){
				$('#deposit_div').hide();
				$('#withdraw_div').show();
				$('#investment_div').hide();
				$('#sales_div').hide();
				$('#trading_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#investment").click(function(){
				$('#deposit_div').hide();
				$('#withdraw_div').hide();
				$('#investment_div').show();
				$('#sales_div').hide();
				$('#trading_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#sales").click(function(){
				$('#deposit_div').hide();
				$('#withdraw_div').hide();
				$('#investment_div').hide();
				$('#sales_div').show();
				$('#trading_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#trading").click(function(){
				$('#deposit_div').hide();
				$('#withdraw_div').hide();
				$('#investment_div').hide();
				$('#sales_div').hide();
				$('#trading_div').show();
			});
		});
		
		$(document).ready(function (){
			$("#loan_entries_btn").click(function(){
				$('#borrower_div').hide();
				$('#gurantor_div').show();
				$('#loan_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#gurantor_previous_btn").click(function(){
				$('#borrower_div').show();
				$('#gurantor_div').hide();
				$('#loan_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#gurantor_btn").click(function(){
				$('#borrower_div').hide();
				$('#gurantor_div').hide();
				$('#loan_div').show();
			});
		});
		
		$(document).ready(function (){
			$("#personal_btn").click(function(){
				$('#borrower_div').hide();
				$('#gurantor_div').show();
				$('#loan_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#proceed").click(function(){
				$('#personal_div').hide();
				$('#reason_div').show();
				$('#plan_div').hide();
				$('#rate_div').hide();
				$('#acc_div').hide();
				$('#amount_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#proceed2").click(function(){
				$('#personal_div').hide();
				$('#reason_div').hide();
				$('#plan_div').show();
				$('#rate_div').hide();
				$('#acc_div').hide();
				$('#amount_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#proceed3").click(function(){
				$('#personal_div').hide();
				$('#reason_div').hide();
				$('#plan_div').hide();
				$('#rate_div').show();
				$('#acc_div').hide();
				$('#amount_div').hide();
			});
		});
		
		$(document).ready(function (){
			$("#proceed4").click(function(){
				var amount = $("#weekly_rate").val();
				
				if(amount > 15){
					$("#result").html("<span style='color:red;'>ROI must not exceed 15</span>");
				}else{
					$('#personal_div').hide();
					$('#reason_div').hide();
					$('#plan_div').hide();
					$('#rate_div').hide();
					$('#acc_div').show();
					$('#amount_div').hide();
				}
			});
		});
		
		$(document).ready(function (){
			$("#proceed5").click(function(){
				$('#personal_div').hide();
				$('#reason_div').hide();
				$('#plan_div').hide();
				$('#rate_div').hide();
				$('#acc_div').hide();
				$('#amount_div').show();
			});
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#search").keyup(function(){
			
			var amount = $("#search").val();
			var contact_type = $("#plan").val();
		
			var dataString = 'sum='+ amount + '&type='+ contact_type;
		
			if(amount != ''){
				$.ajax({
					url:'action.php',
					method: 'POST',
					data:dataString,
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

</body>
</html>