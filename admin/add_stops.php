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
</br></br></br></br></br></br>
<form action="" method="post" enctype="multipart/form-data">
						
						<div style = "text-align:center" class="form">
								<h2><p>
									<label>Stop Name : <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="sname" required />
								</p>	
								<p>
									<label> Phone No. : <span>(Required Field) </span></label>
									<input type="text" class="field size1" name="sphone" required />
								</p>
								</h2>
						</div>
						
						<div style=text-align:center class="buttons">
							<input type="submit" class="button" value="SUBMIT" name="send" />
						</div>
						
					</form>
					<?php
							session_start();
							$username = "";
							$email    = "";
							$errors = array(); 
							$db = mysqli_connect('localhost', 'root', '', 'bicycle');
							if(isset($_POST['send'])){
								
								$sname = $_POST['sname'];
								$sphone = $_POST['sphone'];
								
								$qr = "INSERT INTO stops (sname,sphone,s_status) 
													VALUES ('$sname','$sphone','Open')";
								$result = mysqli_query($db, $qr);
                                $user = mysqli_fetch_assoc($result);
								if($result === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Stop Successfully Added\");
											window.location = (\"stops.php\")
											</script>";
									}
								else 'Failed';
							}
						?>
				</div>

			</div>
</body>
</html>