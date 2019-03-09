<!DOCTYPE html>
<html>
<head>
	<title>Bicycle Rental</title>
	<?php
			include 'header.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to delete this car?")){
				window.location.href ='delete_cycle.php?id='+id;
			}
		}
	</script>
</head>
<body>

<div id="container">
	<div class="shell">
		<br/><br/>
		
		<table style="width:100%">
  <tr>
    <th>Cycle Id</th>
	<th>Cycle Name</th>
	<th>Hire Price</th>
	<th>Status</th>
	<th>Content Control</th>
  </tr>
  <?php
								include 'config.php';
								$select = "SELECT * FROM cycles WHERE status = 'Available'";
								$result = mysqli_query($con,$select);
			            
						while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td> <?php echo $row['cycle_id'] ?> </td>
    <td> <?php echo $row['cycle_name'] ?> </td> 
    <td> <?php echo 'Rs. '.$row['hire_cost'] ?> </td>
	<td> <?php echo $row['status'] ?> </td>
	<td><a href= "delete_cycle.php?id=(<?php echo $row['cycle_id'];?>)" class="ico del">Delete</a></td>
  </tr>
						<?php } ?>
</table>
</div>
<h2><div style=text-align:center><input type="submit" onclick="window.print()" value="Print Here" /></div></h2>
<h2><div style=text-align:center><button onclick="window.location.href='add_cycles.php'" class="btn add">Add New Vehicles</button></div></h2>
</div>
</body>
</html>