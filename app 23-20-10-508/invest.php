<?php 
    include "header.php";
?>

<div class=" container ">
			<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon"><i class="flaticon2-chart text-primary"></i></span>
			<h4 class="card-label">Pricing Table</h4>
		</div>
	</div>
	<div class="card-body">
		<div class="row justify-content-center text-center my-0 my-md-25">
        <?php
            $query = "SELECT * FROM plans";
            $run_query = mysqli_query($connect, $query);
            if(mysqli_num_rows($run_query) > 0){
                while($result = mysqli_fetch_assoc($run_query)){
                    $plan_id = $result['id'];
                    $bundle = $result['bundle'];
                    $minimium = $result['minimium'];
                    $maximium = $result['maximium'];
                    $percentage = $result['percentage'];
                    $referal_bonus = $result['referal_bonus'];
                    $commission = $result['commission'];
                    $duration = $result['duration'];
                    $payout = $result['payout'];
                    $th = $result['th'];
                    $no_of_times = $result['no_of_times'];

                    echo '
                    
                    <!-- begin: Pricing-->
                    
                    <div class="col-md-4 col-xxl-3 bg-white rounded-right shadow-sm">
                        <div class="pt-25 pb-25 pb-md-10 px-4">
                            <h4 class=" mb-15">'.$bundle.'</h4>
                            <span class="px-7 py-3 d-inline-flex flex-center rounded-lg mb-15 bg-primary-o-10">
                                <span class="pr-2 opacity-70">$</span>
                                <span class="pr-2 font-size-h1 font-weight-bold">'.number_format(($minimium),2).'</span>
                                <span class="opacity-70">/&nbsp;&nbsp;Minimum</span>
                            </span>
                            <span class="px-7 py-3 d-inline-flex flex-center rounded-lg mb-15 bg-primary-o-10">
                                <span class="pr-2 opacity-70">$</span>
                                <span class="pr-2 font-size-h1 font-weight-bold">'.number_format(($maximium),2).'</span>
                                <span class="opacity-70">/&nbsp;&nbsp;Maximum</span>
                            </span>
                            <form method="POST" action="invest_now">
                            <span class="px-7 py-3 d-inline-flex flex-center rounded-lg mb-15 bg-primary-o-10">
                                <span class="pr-2 opacity-70">Amount (USD)</span>
                                <span class="opacity-70"><input placeholder="0.00" class="form-control" type="text" name="amount" required></span>
                            </span>
                            <br>
                            <input type="hidden" value="'.$plan_id.'" name="hidden_id">
                            <p class="mb-10 d-flex flex-column text-dark-50">
                                <span><b>Percentage:</b> '.$percentage.'%</span>
                                <span><b>Referral Bonus:</b> '.$referal_bonus.'%</span>
                                <span><b>Duration: </b> '.$duration.'</span>
                            </p>
                            <button type="submit" name="invest_now" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Purchase Plan</button>
                        
                    </form></div>
                    </div>
                    <!-- end: Pricing-->';
                }
            } 
        ?>
		</div>
	</div>
</div>
<!--end::Card-->		</div>

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