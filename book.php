<!DOCTYPE html>
<html>
<head>
<title>Bicycle Rental</title>
	<?php
			include 'header1.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/home_style.css">
</head>
<body background = map.jpg>
             <h1>Select your nearest cycle pickup stop:</h1>
    <?php
						include 'config.php';
						$sql_query = "SELECT * FROM stops WHERE s_status = 'Open'";
						$result = mysqli_query($con,$sql_query);
						while($row = mysqli_fetch_array($result)){
			?>
			<li>	
				<div class="column">
					<a href="book_no.php?id=<?php echo $row['stop_id'] ?>">
						<span class="property_size"><?php echo 'Stop Name: '.$row['sname'];?></span> 
					</a><br/><br/>
					<span class="price"><?php echo 'Phone No.'.$row['sphone'];?></span>
					<div class="property_details">
						<h1>
							<a href="book_no.php?id=<?php echo $row['stop_id'] ?>" ></a>
						</h1>
						<a>Status: <span class="property_size"><?php echo $row['s_status'];?></span></a><br/><br/>
				</div>
              </li>

			<?php
				}
			?>
 
</body>
</html>
