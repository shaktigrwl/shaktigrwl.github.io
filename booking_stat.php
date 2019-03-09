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
						$sql_query = "call dispClientDetails('$_SESSION[username]')";
						$result = mysqli_query($con,$sql_query);
                        $row = mysqli_fetch_array($result);
      		?>
<br/><br/>

<h1 align="center">Dear <?php echo $row['username']?>, your total bill is <?php echo "Rs.".$row['no_of_cycles']*$row['hire_cost']?>.</h1>
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