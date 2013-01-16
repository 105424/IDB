<?php
	include('../config/database.php');

	function CurrentPageURL(){$pageURL = $_SERVER['SERVER_PORT'] != '80' ? $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"] : $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];return $pageURL;}

	
	$created = false; if(isset($_GET['created'])){$created = $_GET['created'];}
	if(isset($_POST["Create"]))
	{
		$redirect = CurrentPageURL();
		if($_POST["Create"]=="Skill")
		{
			$name = $_POST["Name"]; $maxLevel = $_POST["MaxLevel"]; $categorie = $_POST["Categorie"]; $subCategorie = $_POST["SubCategorie"];
			$query = "INSERT INTO Skills(Skill, Categorie, SubCategorie, MaxLevel) VALUES ('$name','$categorie', '$subCategorie', '$maxLevel')";
			
			mysqli_query($db, $query);
			
			header("Location: http://$redirect?created=Skill");
		}
		else if($_POST["Create"]=="Student")
		{
			$name = $_POST["Name"];
			$query = "INSERT INTO Students(Name) VALUES ('$name')";
			
			mysqli_query($db, $query);
			
			header("Location: http://$redirect?created=Student");
		}
	} 

	
	include('../lay_out/header.php');
?>
		<h1>Create Students / Skills </h1>
		<div id="input">
			<h2>Skill</h2>
			<?php if($created=="Skill"){echo "<p>Skill Created</p>";}?>
			<form method="POST" action="Create.php">
				<input type="hidden" name="Create" value="Skill" />
				<input id="SkillName" type="text" name="Name" value="Name"/>
				<input id="SkillCategorie" type="text" name="Categorie" value="Categorie"/>
				<input id="SkillSubCategorie" type="text" name="SubCategorie" value="SubCategorie"/>
				<input id="SkillMaxLevel" type="number" name="MaxLevel" value="MaxLevel" />
				<input type="submit" name="submit" value="Enter" />
			</form>
			
			<h2>Student</h2>
			<?php if($created=="Student"){echo "<p>Student Created</p>";}?>
			<form method="POST" action="Create.php">
				<input type="hidden" name="Create" value="Student" />
				<input id="StudentName" type="text" name="Name" value="Name"/>
				<input type="submit" name="submit" value="Enter" />
			</form>
		</div>
<?php include('../lay_out/footer.php'); ?>