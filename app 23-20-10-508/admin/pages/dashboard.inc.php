
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
									<?php
										$query12 = " SELECT * FROM request";
										$run_query12 = mysqli_query($connection, $query12);
										$acc = mysqli_num_rows($run_query12);
										echo $acc;
									?></div>
                                    <div class="chart-full-period text-center">Investors </div>
                                    <canvas class="chart-full-canvas" id="canvas-full-chart-light"></canvas>
                                </div>
                            </div>
                            <!-- end ecom-widget-chart-full -->
                        </div>
                        <!-- end col -->
                    </div>
                    

                    <!-- end row -->
                </div>
                <!-- end animated fadeIn -->
            </div>
