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
    <th>Stop Id</th>
	<th>Stop Name</th>
	<th>Phone No.</th>
	<th>Status</th>
	<th>Content Control</th>

  </tr>
  <?php
								include 'config.php';
								$select = "SELECT * FROM stops WHERE s_status = 'Open'";
								$result = mysqli_query($con,$select);
			            
						while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td> <?php echo $row['stop_id'] ?> </td>
    <td> <?php echo $row['sname'] ?> </td> 
    <td> <?php echo $row['sphone'] ?> </td>
	<td> <?php echo $row['s_status'] ?> </td>
    <td><a href= "delete_stop.php?id=(<?php echo $row['stop_id'];?>)" class="ico del">Delete</a></td>

  </tr>
						<?php } ?>
</table>
</div>
<h2><div style=text-align:center><input type="submit" onclick="window.print()" value="Print Here" /></div></h2>
<h2><div style=text-align:center><button onclick="window.location.href='add_stops.php'" class="btn add">Add New Stops</button></div></h2>
</div>
</body>
</html>