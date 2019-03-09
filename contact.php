<head>
<title>Bicycle Rental</title>
	<?php
			include 'header1.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/home_style.css">
</head>
<body background = contact.jpg>

<section class="listings">
		<div class="wrapper">
		<h2 style="text-decoration:underline">Contact Us</h2>
		<h3>Phone No.: 2435343, 4354354</h3>
		<h3>Email: cyclathon@gmail.com</h3>
			<ul class="properties_list">
			<form method="post">
				<table>
					<tr>
						<td style="color: #003300; font-weight: bold; font-size: 24px">Enter Your Direct Message Here:</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
							<textarea name="message" placeholder="Enter Message Here" class="txt rows="5" cols="70"></textarea>
						</td>
					</tr>
					<tr>
						<td><br/><br/><input type="submit" name="send" value="Send Message"></td>
					</tr>
				</table>
			</form>
				<?php
					if(isset($_POST['send'])){
						include 'config.php';
						
						$message = $_POST['message'];
						
						$sql_query = "INSERT INTO contact(message,msg_time,user_name)
							VALUES('$message',NOW(),'$_SESSION[username]')";
							$result = mysqli_query($con,$sql_query);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Message Successfully Sent\");
											window.location = (\"home.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Message Not Sent. Try Again\");
											window.location = (\"contact.php\")
											</script>";
							}
					}
				?>
			</ul>
		</div>
	</section>

</body>
</html>