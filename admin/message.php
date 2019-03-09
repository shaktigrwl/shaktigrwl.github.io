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
    <th>Message Id</th>
	<th>Message</th>
	<th>Username</th>
	<th>Time</th>
  </tr>
  <?php
								include 'config.php';
								$select = "SELECT * FROM contact WHERE status = 'Unread' ORDER BY msg_time desc";
								$result = mysqli_query($con,$select);
			            
						while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td> <?php echo $row['msg_id'] ?> </td>
    <td> <?php echo $row['message'] ?> </td> 
    <td> <?php echo $row['user_name'] ?> </td>
	<td> <?php echo $row['msg_time'] ?> </td>
  </tr>
						<?php } ?>
</table>
</div>
<h2><div style=text-align:center><input type="submit" onclick="window.print()" value="Print Here" /></div></h2>
</div>
</body>
</html>