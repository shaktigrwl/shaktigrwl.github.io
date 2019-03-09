<!DOCTYPE html>
<html>
<head>
<title>Bicycle Rental</title>
	<?php
			include 'header1.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/home_style.css">
</head>
<body background = pic3.jpg>
<br/><br/>

    <?php
						include 'config.php';
						?><h2>Welcome <?php echo $_SESSION['username']?></h2>
						<?php
						$sql_query = "SELECT * FROM cycles WHERE status = 'Available'";
						$result = mysqli_query($con,$sql_query);
			            
						while($row = mysqli_fetch_array($result)){
			?>
				<div class="column">
					<a href="book_cycle.php?id=<?php echo $row['cycle_id'] ?>">
						<img class="thumb" src="cycles/<?php echo $row['image'];?>" width="300" height="200"></img>
					</a>
					<span class="price"><?php echo 'Rs.'.$row['hire_cost'];?></span>
					<div class="property_details">
						<h1>
							<a href="book_cycle.php?id=<?php echo $row['cycle_id'] ?>" ></a>
						</h1>
						<h2>Cycle Name: <span class="property_size"><?php echo $row['cycle_name'];?></span></h2>
					</div>
				</div>


			<?php
				}
			?>
 
</body>
</html>
