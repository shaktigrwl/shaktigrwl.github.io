<!DOCTYPE html>
<html>
<head>
<title>Bicycle Rental</title>
	<?php
			include 'header1.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/home_style.css">
</head>
<body background = pic2.jpg>
<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
						include 'config.php';
						$sql_query = "SELECT username, email, cycle_name, sname, no_of_cycles, bdate FROM users,cycles,stops WHERE username = '$_SESSION[username]' and users.cycle_id = cycles.cycle_id and users.stop_id = stops.stop_id";
						$result = mysqli_query($con,$sql_query);
                        $row = mysqli_fetch_array($result);						
			?>
			<h2>The Booking Details are:</h2>
			<div><h3>Username : <?php echo $row['username']?></h3></div>
			<div><h3>Email : <?php echo $row['email']?></h3></div>
			<div><h3>Cycle Name : <?php echo $row['cycle_name']?></h3></div>
			<div><h3>Stop Name : <?php echo $row['sname']?></h3></div>
			<div><h3>No. of cycles booked : <?php echo $row['no_of_cycles']?></h3></div>
			<div><h3>Booking Date : <?php echo $row['bdate']?></h3></div>
			<div>
			    <a href="pay.php?username=<?php echo $row['username'] ?>">Confirm Details</a>
            </div>
	</ul>
	</div>
	</section>
</body>
</html>