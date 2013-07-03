<?php	
	session_start();	
	
	if (isset($_GET["logOut"])){
		session_unset();
		session_destroy();
	}
	else if(isset($_SESSION['pass'])){
		header('Location:index.php');
		echo "SET";
	}
	else if (isset($_POST["Username"])& isset($_POST["Password"])){
		
		include("./Config/database.php");
		
		$us = $_POST["Username"];
		$pass = $_POST["Password"];
		
		
		//$query = "SELECT * FROM Students WHERE Name = '".$us."' AND Pass= '".$pass."'";
		//echo $query;
		$query = mysqli_query($db, "SELECT * FROM Students WHERE Name = '".$us."' AND Pass= '".$pass."'");
		
		
		
		//echo "name:".$us."//pass:".$pass."</br>";
		//echo var_dump($query);
		if(mysqli_num_rows($query)!=0){
			while($row = mysqli_fetch_assoc($query)){ 
				echo $us.$pass;
			
				$_SESSION['pass'] = $row["idStudent"];
				
				echo $_SESSION['pass'] ;
				header('Location:login.php');
			}
		}
	}
	
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<title>IDB</title>
</head>

<body>
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="login-form">
          <h2>Login</h2>
          <form action="login.php" method="post">
            <fieldset>
              <div class="clearfix">
                <input type="text" name="Username">
              </div>
              <div class="clearfix">
                <input type="password" name="Password">
              </div>
              <button href="login.php" class="btn primary" type="submit">Sign in</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div> 
  <!-- /container -->
</body>
</html>