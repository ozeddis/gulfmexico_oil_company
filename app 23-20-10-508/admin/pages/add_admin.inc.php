<?php
	if(isset($_POST['add_wallet'])){
		$acc_password = md5(sha1($_POST['password']));
		$email2 = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['email']))));
		$user = ucwords(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['username']))));
	
		$query = "SELECT * FROM admin WHERE email = '{$email2}'";
		$run_query = mysqli_query($connection, $query);
		
		if(mysqli_num_rows($run_query) > 0){
			echo "<script type=\"text/javascript\">
			alert(\"Email Already Exists\");
			window.location = \"admin_page.php?p=add_admin\"
			</script>";
		}else{
			$query46 = $connection->prepare("INSERT INTO admin (email,username,password) VALUES(?,?,?)");
			$query46->bind_param("sss", $email2,$user,$acc_password);
			$query46->execute();
				
			if($query46->affected_rows > 0){
				echo "<script type=\"text/javascript\">
					alert(\"Created Admin Successfully\");
					window.location = \"admin_page.php?p=add_admin\"
					</script>";
			}else{
				echo "<script type=\"text/javascript\">
					alert(\"Could not create admin\");
					window.location = \"admin_page.php?p=add_admin\"
					</script>";
			}
		}
	}
?>
<ol class='breadcrumb bc-colored bg-theme' id='breadcrumb'>
	<li class='breadcrumb-item '>
		<a href='admin_page.php?p=dashboard'>Home</a>
	</li>
	<li class='breadcrumb-item'>
		Dashboard
	</li>
</ol>

<form action='' method='POST'>
	<div class='container-fluid'>
		<div class='animated fadeIn'>
			<div class='row'>
				<div class='col-sm-12'>
					<div class='card'>
						<div class='card-header text-theme'>
							<strong>Create Admin</strong>
						</div>
						<div class='card-body'>
							<div class='row'>
								<div class='col-sm-12'>
									<div class='form-group'>
										<label for='name'>Email Address </label>
										<input type='email' class='form-control' name='email' placeholder='Enter Email' required>
									</div>
									<div class='form-group'>
										<label for='name'>Account Username</label>
										<input type='text' class='form-control' name='username' placeholder='Enter Username' required>
									</div>
									<div class='form-group'>
										<label for='name'>Account Password</label>
										<input type='password' class='form-control' name='password' placeholder='Enter Password' required>
									</div>
								</div>
							</div>
							<div class='row'>
								<button type='submit' class='btn btn-theme btn-sm' name='add_wallet'><i class='fa fa-dot-circle-o'></i> Create Account</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>