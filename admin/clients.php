<!DOCTYPE html>
<html>
<head>
	<title>Bicycle Rental</title>
	<?php
			include 'header.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

<div id="container">
	<div class="shell">
		<br/><br/>
		
		<table style="width:100%">
  <tr>
    <th>Client Id</th>
	<th>Username</th>
	<th>Email</th>
	<th>Password</th>
	<th>Cycle Name</th>
	<th>Stop Name</th>
	<th>Booking Date</th>
	<th>No. of Booked Cycles</th>
	<th>Total cost</th>
  </tr>
  <?php
								include 'config.php';
								$select = "SELECT id,username,password,hire_cost,email,cycle_name,sname,no_of_cycles,bdate FROM users,cycles,stops WHERE users.cycle_id = cycles.cycle_id and users.stop_id = stops.stop_id ORDER BY bdate DESC";
								$result = mysqli_query($con,$select);
			            
						while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td> <?php echo $row['id'] ?> </td>
    <td> <?php echo $row['username'] ?> </td> 
	<td> <?php echo $row['email'] ?> </td>
	<td> <?php echo $row['password'] ?> </td>
	<td> <?php echo $row['cycle_name'] ?> </td>
	<td> <?php echo $row['sname'] ?> </td>
	<td> <?php echo $row['bdate'] ?> </td>
	<td> <?php echo $row['no_of_cycles'] ?> </td>
    <td> <?php echo 'Rs. '.$row['hire_cost']*$row['no_of_cycles'] ?> </td>
  </tr>
						<?php } ?>
</table>
</div>
<h2><div style=text-align:center><input type="submit" onclick="window.print()" value="Print Here" /></div></h2>
</div>
</body>
</html>