<?php
	include"includes/core.inc.php";
	$output = '';
	
	if(isset($_POST['export_excel'])){
		
		$query = "SELECT * FROM registration";
		$run_query = mysqli_query($connection, $query);
		
		if(mysqli_num_rows($run_query) > 0){
			$output .= '
				<table class="table" bordered="1">
					<tr>
						<th>S/N</th>
						<th>Email</th>
					</tr>
			';
			$x = 0;
			while($result = mysqli_fetch_array($run_query)){
				$x++;
				$last = $result['email'];
				
				$output .= '
					<tr>
						<td>'.$x.'</td>
						<td>'.$last.'</td>
					</tr>
			';
			}
			$output .='</table>';
			header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=emails.xls");
			echo $output;
		}else{
			echo "<script type=\"text/javascript\">
				alert(\"There are No Registered Students Now.\");
				window.location = \"admin_dashboard.php?p=emails\"
				</script>";
		}
	}
?>