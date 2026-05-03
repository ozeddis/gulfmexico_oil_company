<?php
	if(isset($_POST['add_wallet'])){
		$old_password = md5(sha1($_POST['old_password']));
		$new_password = md5(sha1($_POST['new_password']));
	
		if($old_password != $password){
			echo "<script type=\"text/javascript\">
				alert(\"Incorrect old Password\");
				window.location = \"admin_page.php?p=change_password\"
				</script>";
		}else{
			$query46 = $connection->prepare("UPDATE admin SET password = ? WHERE email = ?");
			$query46->bind_param("ss", $new_password,$email);
			$query46->execute();
			
			if($query46->affected_rows > 0){
				echo "<script type=\"text/javascript\">
					alert(\"Password Updated successfully\");
					window.location = \"admin_page.php?p=change_password\"
					</script>";
			}else{
				echo "<script type=\"text/javascript\">
					alert(\"Could not edit password\");
					window.location = \"admin_page.php?p=change_password\"
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
							<strong>Change Account Password</strong>
						</div>
						<div class='card-body'>
							<div class='row'>
								<div class='col-sm-12'>
									<div class='form-group'>
										<label for='name'>Old Password </label>
										<input type='password' class='form-control' name='old_password' placeholder='Enter old Password'>
									</div>
									<div class='form-group'>
										<label for='name'>New Password</label>
										<input type='password' class='form-control' name='new_password' placeholder='Enter New Password'>
									</div>
								</div>
							</div>
							<div class='row'>
								<button type='submit' class='btn btn-theme btn-sm' name='add_wallet'><i class='fa fa-dot-circle-o'></i> Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>