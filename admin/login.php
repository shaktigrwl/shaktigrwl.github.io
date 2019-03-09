<!DOCTYPE html>
<html>
<head>
	<title>Bicycle Rental</title>
	<?php
			include 'header1.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<br/><br/><br/><br/>
<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Admin Login</h1>
            <div>
			<tr>
                <td>Username :</td><br/><input type="text" class="textbox" id="txt_username" name="txt_username" placeholder="Enter your Username" />
            </tr>
			</div>
            <div>
			<tr>
                <td>Password :</td><br/><input type="password" class="textbox" id="txt_username" name="txt_pwd" placeholder="Enter your Password"/>
            </tr>
			</div>
            <div>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />
        </div>
    </form>
	<?php
        include "config.php";
        if(isset($_POST['but_submit'])){

            $username = mysqli_real_escape_string($con,$_POST['txt_username']);
            $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

        if ($username != "" && $password != ""){

			$sql_query = "select count(*) as cntUser from admin where uname='".$username."' and pass='".$password."'";
			$result = mysqli_query($con,$sql_query);
			$row = mysqli_fetch_array($result);

			$count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $username;
            echo "<script type = \"text/javascript\">
									alert(\"Login Successful\");
									window.location = (\"cycles.php\")
									</script>";
        }else{
            echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again\");
									window.location = (\"login.php\")
									</script>";
        }

    }

}
?>
</div>
</html>