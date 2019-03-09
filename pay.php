<!DOCTYPE html>
<html>
<head>
<title>Bicycle Rental</title>
	<?php
			include 'header1.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/home_style.css">
</head>
<body background = pay.jpg>
<?php
						include 'config.php';
						$sql_query = "SELECT id,username,hire_cost,email,cycle_name,sname,no_of_cycles,bdate FROM users,cycles,stops WHERE username = '$_GET[username]' and users.cycle_id = cycles.cycle_id and users.stop_id = stops.stop_id";
						$result = mysqli_query($con,$sql_query);
                        $row = mysqli_fetch_array($result);
      		?>
<br/><br/>

<h1 align="center">Dear <?php echo $row['username']?>, your total bill is <?php echo "Rs.".$row['no_of_cycles']*$row['hire_cost']?>.</h1>
<h3 align="center">Kindly pay by cash or card (debit/credit) at <?php echo $row['sname']?> stop. And take a print of the details and show at the stop to hire your bicycle.</h3><br/><br/>
<h3 align="center">USERNAME: <?php echo $row['username']?></h3>
<h3 align="center">EMAIL: <?php echo $row['email']?></h3>
<h3 align="center">CYCLE NAME: <?php echo $row['cycle_name']?></h3>
<h3 align="center">STOP NAME: <?php echo $row['sname']?></h3>
<h3 align="center">HIRE COST/CYCLE: <?php echo $row['hire_cost']?></h3>
<h3 align="center">NO_OF_CYCLES BOOKED: <?php echo $row['no_of_cycles']?></h3>
<h3 align="center">BOOKING DATE: <?php echo $row['bdate']?></h3>
</div>
					<h2><div style=text-align:center><input type="submit" onclick="window.print()" value="Print Here" /><div></h2>
</div>
</html>