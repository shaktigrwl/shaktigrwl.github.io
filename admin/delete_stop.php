<?php
	include 'config.php';
	$id = $_REQUEST['id'];
		$query = "DELETE FROM stops WHERE stop_id = '$id'";
	    $result = mysqli_query($con,$query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Stop Successfully Deleted\");
					window.location = (\"stops.php\")
				</script>";
	}
?>