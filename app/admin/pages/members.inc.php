
 <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="client_mining.php">Home</a>
	</li>
	
	<li class="breadcrumb-item active">Dashboard</li>
</ol>
<br>
 <div class="container-fluid">
	<div class="animated fadeIn">
		<h3>Members Details</h3>
		
		<br/>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-accent-theme">
					<div class="card-body">
						
						<table class="table-hover dataTable table-striped" data-plugin="dataTable" width="100%">
							<thead>
								<tr>
									<th class='text-center'>S/N</th>
									<th class='text-center'>Fullname</th>
									<th class='text-center'>Email</th>
									<th class='text-center'>Phone</th>
									<th class='text-center'>Type</th>
								</tr>
							  </thead>
							<?php
								$query22 = " SELECT * FROM requests";
								$run_query22 = mysqli_query($connection, $query22);
								if(mysqli_num_rows($run_query22) > 0){
									$x = 1;
									while($result = mysqli_fetch_assoc($run_query22)){
										$fullname = $result['name'];
										$email_user = $result['email'];
										$phone = $result['phone'];
										$type = $result['type'];
										echo "
												<tr>
													<td class='text-center'>$x</td>
													<td class='text-center'>$fullname</td>
													<td class='text-center'>$email_user</td>
													<td class='text-center'>$phone</td>
													<td class='text-center'>$type</td>
												</tr>
											";
											$x++;
									}
								}else{
									echo "You have no members ";
								}
							?>
							
						</table>
					</div>
					<!-- end card-body -->
				</div>
				<!-- end card -->
			</div>
			<!-- end col -->
		</div>
	</div>
</div>

