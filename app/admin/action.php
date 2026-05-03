<?php
	require"includes/core.inc.php";
	
	if(isset($_POST['query'])){
		$inpText = $_POST['query'];
		
		$total = $inpText / 50;
		
		echo "<input type='text' class='form-control' value='$total Grams of Gold'>";
		//echo "Your Request is $total Grams of Gold";
	}
?>