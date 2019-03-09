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
<br/><br/><br/><br/>
<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
						include 'config.php';
						$sql_query = "SELECT * FROM cycles WHERE cycle_id = '$_GET[id]'";
						$result = mysqli_query($con,$sql_query);
                        $row = mysqli_fetch_array($result);
      		?>
				<li>
					<a href="book_cycle.php?id=<?php echo $row['cycle_id'] ?>">
						<img class="thumb" src="cycles/<?php echo $row['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo 'Rs.'.$row['hire_cost'];?></span>
					<div class="property_details">
						<h1>
							<a href="book_cycle.php?id=<?php echo $row['cycle_id'] ?>"></a>
						</h1>
						<h2>Cycle Name: <span class="property_size"><?php echo $row['cycle_name'];?></span></h2>
					</div>
				</li><br/><br/>
			<?php
						$qry = "UPDATE users SET cycle_id = '$_GET[id]' WHERE username = '$_SESSION[username]'";
						$res = mysqli_query($con,$qry);        
      		?>
				<h3>Proceed to Hire <?php echo $row['cycle_name'];?>&nbsp;&nbsp;&nbsp;<a href="book.php?id=<?php echo $row['cycle_id'] ?>">Click to Book</a></h3>
</body>
</html>
