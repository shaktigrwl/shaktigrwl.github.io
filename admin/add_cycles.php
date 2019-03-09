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
									<label>Cycle Name : <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="cycle_name" required />
								</p>	
								<p>
									<label> Hire Price : <span>(Required Field) </span></label>
									<input type="text" class="field size1" name="hire_cost" required />
								</p>
								<p>
									<label>Cycle Image : <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="image" required />
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
								
								$target_path = "../cycles/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
								
								$image = basename($_FILES['image']['name']);
								$cycle_name = $_POST['cycle_name'];
								$hire_cost = $_POST['hire_cost'];
								
								$qr = "INSERT INTO cycles (image, cycle_name,hire_cost,status) 
													VALUES ('$image','$cycle_name','$hire_cost','Available')";
								$result = mysqli_query($db, $qr);
                                $user = mysqli_fetch_assoc($result);
								if($result === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Cycle Successfully Added\");
											window.location = (\"cycles.php\")
											</script>";
									}
								}
								else 'Failed';
							}
						?>
				</div>

			</div>
</body>
</html>