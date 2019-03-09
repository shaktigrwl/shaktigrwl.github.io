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
						$qry = "UPDATE users SET stop_id = '$_GET[id]' WHERE username = '$_SESSION[username]'";
						$res = mysqli_query($con,$qry);        
      		?>
			<div><h3>How many cycles do you want to book ? :  <input type="text" name="no_of_cycles" ></h3></div>

			<?php 
			    if(isset($_POST['save']))
			{
				$no_of_cycles = $_POST['no_of_cycles'];
				echo $sql = "UPDATE users SET no_of_cycles = $no_of_cycles, 
				           bdate = curdate() WHERE username = '".$_SESSION['username']."'" ;
				$result = mysqli_query($con,$sql);
			}
			?>
			<div>
			     <button type="submit" onclick="window.location.href='book_final.php'" name="save">Submit</button>
            </div>
	</ul>
	</div>
	</section>
</body>
</html>