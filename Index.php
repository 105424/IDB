<?php 
	
	session_start();
	
	if(!isset($_SESSION['pass'])){
		header('Location:login.php');
	}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/style_idb.css" />
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<title>IDB</title>
</head>

<body>
    <!-- Main Container -->
    <div class="row-fluid">
        <div class="span12">
          <div class="row-fluid">
            <div class="span2">
            </div>
            <div class="span8">
              <div class="row-fluid">
                <!-- Header -->
                <div class="span12 header">
                    <img class="logo" src="assets/img/logo.png" />
                    <button class="btn btn-large pull-right" type="button">Uitloggen</button>
                    <button class="btn btn-large pull-right" type="button">Profiel</button>
                </div>
                <div class="span12">
                    <div class="row-fluid">
                        <!-- Skill Tree -->
                        <div class="span5">
                            <form method="get" action="./skillTree.php">
                                <button type="Submit" class="btn" type="button">
                                        <img src="assets/img/skilltree.png" />
                                </button>
                            </form>
                        </div>
                        <div class="span1">
                        </div>
                        <!-- Carriere Coach -->
                        <div class="span5">
                            <form method="get" action="./coach.php">
                                <button type="Submit" class="btn" type="button">
                                        <img src="assets/img/carrierecoach.png" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="span2">
            </div>
          </div>
        </div>
    </div>
</body>
</html>
