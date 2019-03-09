<?php
	include 'config.php';
	$id = $_REQUEST['id'];
		$query = "DELETE FROM cycles WHERE cycles.cycle_id = '$id'";
	    $result = mysqli_query($con,$query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Cycle Successfully Deleted\");
					window.location = (\"cycles.php\")
				</script>";
	}
?>