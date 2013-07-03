<?php
session_start();
	if(!isset($_SESSION['pass'])){
		header('Location:login.php');
	}


	include("./Config/database.php");
	
	if(isset($_GET['id']) == false && isset($_GET['name'])==false) {
		$studentId = 1;
	} else {
		$studentId = $_GET['id'];
	}
	
	class Skill
	{
		public $id;
		public $name;
		public $lvl;
		public $maxLvl;
		public $categorie;
		public $subCategorie;
	}
	$studentId = 1;
	$studentId = $_GET['id'];
	$Student = mysqli_query($db, "SELECT * FROM Students 
								  INNER JOIN StudentsSkills
								  ON Students.idStudent = StudentsSkills.Students_idStudent 
								  INNER JOIN Skills
								  ON StudentsSkills.Skills_idSkills = Skills.idSkills
								  WHERE Students.idStudent = 1");
	
	$studentSkills = array();
	
	if(mysqli_num_rows($Student)!=0)
	{
		while($row = mysqli_fetch_assoc($Student))
		{
			$obj = new Skill;
			$obj->id = $row['idSkills']; $obj->name = $row['Name']; $obj->lvl = $row['MaxLevel']; $obj->maxLvl = $row['Level'];$obj->categorie = $row['Categorie']; $obj->subCategorie = $row['SubCategorie'];
			
			array_push($studentSkills, $obj);
		}		
	}
	
	
	class Cat
	{
		public $name;
		public $subCats;
	}
	class subCat
	{
		public $name;
		public $skills;
	}
	
	$cats = array();

	function getCat($name,$obj)
	{
		foreach($obj as $st){
			if($st->name == $name)
			{
				return  $st;
			}
		}
		
		return false;
	}
	
	function dupCat($str, $obj){			
		if(count($obj) !=0){
			foreach($obj as $st){
				if($str == $st->name){
					return true;
				}
			}
			return false;
		}
		else{
			return false;
		}
	}
	
	foreach($studentSkills as $skill){
		
		if(dupCat($skill->categorie,$cats) == false)
		{
			$cat = new Cat;
			$cat->name = $skill->categorie;
			
			$cat->subCats = array();
			
			$subCat = new subCat;
			$subCat->name = $skill->subCategorie;
			$subCat->skills = array();
	
			array_push($subCat->skills, $skill);	

			array_push($cat->subCats, $subCat);
	
			array_push($cats, $cat);
			
		}else{
			$cat = getCat($skill->categorie,$cats);
			if(dupCat($skill->subCategorie,$cat->subCats) == false)
			{
				$subCat = new subCat;
				$subCat->name = $skill->subCategorie;
				$subCat->skills = array();
				
				array_push($subCat->skills, $skill);
				
				array_push($cat->subCats, $subCat);
			}else{
				$subCat = getCat($skill->subCategorie,$cat->subCats);
				array_push($subCat->skills, $skill);
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
                    
                    <!-- Button to trigger uitloggen modal -->
                    <a href="#UitloggenModal" role="button" class="btn btn-large pull-right" data-toggle="modal">Uitloggen</a>
                    
                    <!-- Button to trigger profiel modal -->
                    <a href="#ProfielModal" role="button" class="btn btn-large pull-right" data-toggle="modal">Profiel</a>
                    
                    <!-- UitloggenModal -->
                    <div id="UitloggenModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Uitloggen</h3>
                      </div>
                      <div class="modal-body">
                        <p>Weet u het zeker?</p>
                      </div>
                      <div class="modal-footer">
                        <form method="get" action="/login.php">
                            <button type="Submit" class="btn pull-right logoutbtn" aria-hidden="true">Ja</button>
                        </form>
                        <button class="btn-primary pull-right" data-dismiss="modal" aria-hidden="true">Nee</button>
                      </div>
                    </div>
                     
                    <!-- ProfielModal -->
                    <div id="ProfielModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Profiel</h3>
                      </div>
                      <div class="modal-body">
                        <p>Naam:</p>
                        <p>ophalen uit database.</p>
                      </div>
                      <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                    
                </div>
                <div class="span12">
                    <div class="row-fluid">
                        <!-- Skill Tree -->
                        <div class="span11">
                        
                            <!-- Accordion Main level-->
                            
                            <div class="accordion" id="accordion2">
							
							<ul> 
								<?php foreach($cats as $cat){ ?>
									<li> <?php echo $cat->name;?>
										<ul>
											<?php foreach($cat->subCats as $subCat){ ?>
												<li> <?php echo $subCat->name;?>
													<div class="accordion-inner">
														<?php foreach($subCat->skills as $skill){ ?>
													
															<h5><?php echo $skill->name;?></h5>
															<div class="progress progress-striped active">
															
																<?php 
																	$progress = 5 / ($skill->maxLvl /100);
																?>
															
																<div class="bar" <?php echo "style ='width: ".$progress."%'"?>></div>
															</div>
														<?php }?>
													</div>
												</li>
											<?php }?>
										</ul>
									
									</li>
								<?php }?>
							</ul>
							<div class="accordion" id="accordion2">
                              <div id="#subaccordion2" class="accordion-group">
                                <div class="accordion-heading">
                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    Categorie 2
                                  </a>
                                </div>
                                <div id="collapseTwo" class="accordion-heading collapse">
                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#subaccordion2" href="#collapseTwoOne">
                                    Categorie 2.1
                                  </a>
                                </div>
                                <div id="collapseTwoOne" class="accordion-body collapse">
                                  <div class="accordion-inner">
                                    <h5>Skill1</h5>
                                    <div class="progress progress-striped active">
                                        <div class="bar" style="width: 40%;"></div>
                                    </div>
                                    <h5>Skill2</h5>
                                    <div class="progress progress-striped active">
                                        <div class="bar" style="width: 10%;"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="accordion" id="accordion3">
                              <div id="#subaccordion3" class="accordion-group">
                                <div class="accordion-heading">
                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree">
                                    Categorie 3
                                  </a>
                                </div>
                                <div id="collapseThree" class="accordion-heading collapse">
                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#subaccordion3" href="#collapseThreeOne">
                                    Categorie 3.1
                                  </a>
                                </div>
                                <div id="collapseThreeOne" class="accordion-body collapse">
                                  <div class="accordion-inner">
                                    <h5>Skill1</h5>
                                    <div class="progress progress-striped active">
                                        <div class="bar" style="width: 40%;"></div>
                                    </div>
                                    <h5>Skill2</h5>
                                    <div class="progress progress-striped active">
                                        <div class="bar" style="width: 10%;"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
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
