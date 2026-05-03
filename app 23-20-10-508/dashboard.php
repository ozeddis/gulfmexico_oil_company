<?php 
	require "header.php";
?>
	
				
			<div class='container'>
				<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
				  <ol class='carousel-indicators'>
					<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
					<li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
					<li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
				  </ol>
				  <div class='carousel-inner'>
					<div class='carousel-item active'>
					  <img class='d-block w-100' src='images/14.jpg' alt='First slide'>
					  <div class='carousel-caption d-none d-md-block' style='color:#000;'>
						
					  </div>
					</div>
					<div class='carousel-item'>
					  <img class='d-block w-100' src='images/8.jpg' alt='Second slide'>
					  <div class='carousel-caption d-none d-md-block' style='color:#000;'>
						
					  </div>
					</div>
					<div class='carousel-item'>
					  <img class='d-block w-100' src='images/6.png' alt='Third slide'>
					   <div class='carousel-caption' style='color:#fb654b;'>
						
					  </div>
					</div>
					
					<div class='carousel-item'>
					  <img class='d-block w-100' src='images/about.jpg' alt='Fifth slide'>
					   <div class='carousel-caption' style='color:#fb654b;'>
						
					  </div>
					</div>
					<div class='carousel-item'>
					  <img class='d-block w-100' src='images/goal.jpg' alt='Sixth slide'>
					   <div class='carousel-caption' style='color:#fb654b;'>
						
					  </div>
					</div>
					<!--<div class='carousel-item'>
					  <img class='d-block w-100' src='image/Financial-Analysis-Software.png' alt='Seventh slide'>
					   <div class='carousel-caption' style='color:#fb654b;'>
						
					  </div>
					</div>
					<div class='carousel-item'>
					  <img class='d-block w-100' src='image/61134881-young-businessman-analyzing-financial-chart-on-multiple-computers-in-office.jpg' alt='Eight slide'>
					   <div class='carousel-caption' style='color:#fb654b;'>
						
					  </div>
					</div>
				  </div>-->
				  <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
					<span class='carousel-control-prev-icon' aria-hidden='true'></span>
					<span class='sr-only'>Previous</span>
				  </a>
				  <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
					<span class='carousel-control-next-icon' aria-hidden='true'></span>
					<span class='sr-only'>Next</span>
				  </a>
				</div>
				<br>
				<div class='row'></div>
			</div>
			<br>
			<div class='d-flex flex-column-fluid' style='margin-top:20px;'>
			<!--begin::Container-->
				<div class='container'>
				<div class='row'>
						<div class='col-lg-6 col-xxl-4'>
							<!--begin::Mixed Widget 1-->
							<div class='card card-custom bg-gray-100 card-stretch gutter-b'>
								
								<div class='card-body p-0 position-relative overflow-hidden'>
									<!--begin::Chart-->
									<div id='kt_mixed_widget_1_chart' class='card-rounded-bottom bg-danger' style='height: 200px'></div>
									<!--end::Chart-->
									<!--begin::Stats-->
									<div class='card-spacer mt-n25'>
										<!--begin::Row-->
										<div class='row m-0'>
											<div class='col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7'>
												<span class='svg-icon svg-icon-3x svg-icon-warning d-block my-2'>
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>
														<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
															<rect x='0' y='0' width='24' height='24' />
															<rect fill='#000000' opacity='0.3' x='13' y='4' width='3' height='16' rx='1.5' />
															<rect fill='#000000' x='8' y='9' width='3' height='11' rx='1.5' />
															<rect fill='#000000' x='18' y='11' width='3' height='9' rx='1.5' />
															<rect fill='#000000' x='3' y='13' width='3' height='7' rx='1.5' />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<a href='#' class='text-warning font-weight-bold font-size-h6'>Total Balance</a>
												<p class='text-warning font-weight-bold font-size-h6 text-center'><?php echo number_format(($account),2);?> USD</p>
												
											</div>
											<div class='col bg-light-primary px-6 py-8 rounded-xl mb-7'>
												<span class='svg-icon svg-icon-3x svg-icon-primary d-block my-2'>
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Add-user.svg-->
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>
														<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
															<polygon points='0 0 24 0 24 24 0 24' />
															<path d='M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z' fill='#000000' fill-rule='nonzero' opacity='0.3' />
															<path d='M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0094689,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z' fill='#000000' fill-rule='nonzero' />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<a href='#' class='text-primary font-weight-bold font-size-h6 mt-2'>Total Funding</a>
												<p class='text-warning font-weight-bold font-size-h6 text-center'><?php echo number_format(($total_deposit),2);?> USD</p>
											</div>
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class='row m-0'>
											<div class='col bg-light-danger px-6 py-8 rounded-xl mr-7'>
												<span class='svg-icon svg-icon-3x svg-icon-danger d-block my-2'>
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>
														<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
															<polygon points='0 0 24 0 24 24 0 24' />
															<path d='M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z' fill='#000000' fill-rule='nonzero' />
															<path d='M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22346865,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z' fill='#000000' opacity='0.3' />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<a href='#' class='text-danger font-weight-bold font-size-h6 mt-2'>Total Withdrawn</a>
												<p class='text-warning font-weight-bold font-size-h6 text-center'><?php echo number_format(($withdrawn),2); ?> USD</p>
											</div>
											<div class='col bg-light-success px-6 py-8 rounded-xl'>
												<span class='svg-icon svg-icon-3x svg-icon-success d-block my-2'>
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>
														<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
															<rect x='0' y='0' width='24' height='24' />
															<path d='M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z' fill='#000000' opacity='0.3' />
															<path d='M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z' fill='#000000' />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<a href='#' class='text-success font-weight-bold font-size-h6 mt-2'>Market Rate</a>
												<p class='text-warning font-weight-bold font-size-h6 text-center'>-20%</p>
											</div>
										</div>
										<!--end::Row-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Mixed Widget 1-->
						</div>
						<div class='col-xl-4'>
							<!--begin::Mixed Widget 5-->
							<div class='card card-custom bg-radial-gradient-danger gutter-b card-stretch'>
								
								<div class='card-body d-flex flex-column p-0'>
									<!--begin::Chart-->
									<div id='kt_mixed_widget_5_chart' style='height: 200px'></div>
									<!--end::Chart-->
									<!--begin::Stats-->
									<div class='card-spacer bg-white card-rounded flex-grow-1'>
										<!--begin::Row-->
										<div class='row m-0'>
											<div class='col px-8 py-6 mr-8'>
												<div class='font-size-sm text-muted font-weight-bold'>Current Earning</div>
												<div class='font-size-h4 font-weight-bolder'><?php echo number_format(($earn),2)?></div>
											</div>
											<div class='col px-8 py-6'>
												<div class='font-size-sm text-muted font-weight-bold'>Active Trade</div>
												<div class='font-size-h4 font-weight-bolder'><?php echo number_format(($m),2)?></div>
											</div>
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class='row m-0'>
											<div class='col px-8 py-6 mr-8'>
												<div class='font-size-sm text-muted font-weight-bold'>Pending Withdrawal</div>
												<div class='font-size-h4 font-weight-bolder'><?php echo number_format(($sum22),2)?></div>
											</div>
											<div class='col px-8 py-6'>
												<div class='font-size-sm text-muted font-weight-bold'>Pending Deposit</div>
												<div class='font-size-h4 font-weight-bolder'><?php echo number_format(($pending_deposit),2)?></div>
											</div>
										</div>
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Mixed Widget 5-->
						</div>
						<div class='col-lg-6 col-xxl-4'>
							<!--begin::Stats Widget 11-->
							<div class='card card-custom card-stretch card-stretch-half gutter-b'>
								<!--begin::Body-->
								<div class='card-body p-0'>
									<div class='d-flex align-items-center justify-content-between card-spacer flex-grow-1'>
										<span class='symbol symbol-50 symbol-light-success mr-2'>
											<span class='symbol-label'>
												<span class='svg-icon svg-icon-xl svg-icon-primary'>
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>
														<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
															<polygon points='0 0 24 0 24 24 0 24' />
															<path d='M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z' fill='#000000' fill-rule='nonzero' opacity='0.3' />
															<path d='M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0094689,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z' fill='#000000' fill-rule='nonzero' />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</span>
										</span>
										<div class='d-flex flex-column text-right'>
											<span class='text-dark-75 font-weight-bolder font-size-h3'>0</span>
											<span class='text-muted font-weight-bold mt-2'>Referrals</span>
											
										</div>
									</div>
									<div id='kt_stats_widget_11_chart' class='card-rounded-bottom' data-color='success' style='height: 150px'></div>
								<input type="text" value="Account ID: <?php echo $acc_id?>" class="form-control">
								</div>
								<!--end::Body-->
							</div>
							
							<!--end::Stats Widget 12-->
						</div>
						<div>
							
						
						</div>
					</div>
					<div class='row'>
					
					<div class='col-lg-4'>
						<!--begin::Callout-->
						<div class='card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0'>
							<div class='card-body'>
								<div class='d-flex align-items-center p-5'>
									<!--begin::Icon-->
									<div class='mr-6'>
										<span class='svg-icon svg-icon-danger svg-icon-4x'>
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Thunder-move.svg-->
											<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>
												<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
													<rect x='0' y='0' width='24' height='24' />
													<path d='M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z' fill='#000000' />
													<path d='M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z' fill='#000000' opacity='0.3' />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Icon-->
									<!--begin::Content-->
									<div class='d-flex flex-column'>
										<a href='trading_bitcoin' class='text-dark text-hover-primary font-weight-bold font-size-h4 mb-3'>Investment</a>
										<div class='text-dark-75'>Knowing the right details gets you a great return. Ignore them you just crash and burn.</div>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
					<div class='col-lg-4'>
						<!--begin::Callout-->
						<div class='card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0'>
							<div class='card-body'>
								<div class='d-flex align-items-center p-5'>
									<!--begin::Icon-->
									<div class='mr-6'>
										<span class='svg-icon svg-icon-success svg-icon-4x'>
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Sketch.svg-->
											<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'>
												<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
													<rect x='0' y='0' width='24' height='24' />
													<polygon fill='#000000' opacity='0.3' points='5 3 19 3 23 8 1 8' />
													<polygon fill='#000000' points='23 8 12 20 1 8' />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Icon-->
									<!--begin::Content-->
									<div class='d-flex flex-column'>
										<a href='rewards' class='text-dark text-hover-primary font-weight-bold font-size-h4 mb-3'>Affiliates</a>
										<div class='text-dark-75'>Join in the world of ZenFirm and help spread the opportunities available and stand a chance of earning more profit.</div>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
				</div>
				</div>
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
<script src="//code.tidio.co/prnxokzvwdfkrtzjcrhjxolm5pbj6tv2.js" async></script>

</body>
</html>