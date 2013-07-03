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
                    <a href="index.php"><img class="logo" src="assets/img/logo.png" /></a>
                    <button class="btn btn-large pull-right" type="button">Uitloggen</button>
                    <button class="btn btn-large pull-right" type="button">Profiel</button>
                </div>
                <div class="span12">
                    <div class="row-fluid">
                        <!-- Filter kolom -->
                        <div class="span4">
                            <div class="span12 coachfilter">
                                <legend>Filters</legend>
                                <label>Zoeken op vacature:</label>
                                <input type="text" placeholder="Vacature">
                                <br>
                                <button class="btn" type="button">Zoeken</button>
                                <br><br>
                                <label>Zoeken op skill:</label>
                                <select>
                                  <option>Skill 1</option>
                                  <option>Skill 2</option>
                                  <option>Skill 3</option>
                                  <option>Skill 4</option>
                                  <option>Skill 5</option>
                                </select>
                                <select>
                                  <option>Level 1</option>
                                  <option>Level 2</option>
                                  <option>Level 3</option>
                                  <option>Level 4</option>
                                  <option>Level 5</option>
                                </select>
                                <br>
                                <button class="btn" type="button">Zoeken</button>
                            </div>
                        </div>
                        <div class="span1">
                        </div>
                        <!-- vacatures -->
                        <div class="span7">
                            <div class="span12">
                                <h1>Vacatures:</h1>
                            </div>
                            <div class="span12" id="vacature">
                                <p>Vacature: Vacature 1</p>
                                <p>Beschrijving: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                <p>Skills:</p>
                                <button class="btn" type="button">Reageer</button>
                            </div>
                            <div class="span12" id="vacature">
                                <p>Vacature: Vacature 2</p>
                                <p>Beschrijving: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                <p>Skills:</p>
                                <button class="btn" type="button">Reageer</button>
                            </div>
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
