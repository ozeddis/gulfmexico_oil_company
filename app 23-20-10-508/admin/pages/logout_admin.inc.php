<?php
	require"../../includes/core.inc.php";

	session_destroy();
	header("location: login.php");
?>
