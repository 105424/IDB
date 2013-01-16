<?php
	include('../config/database.php');

	$Students = mysqli_query($db, "SELECT * FROM Students");
	$Skills = mysqli_query($db, "SELECT * FROM Skills");

	function CurrentPageURL(){$pageURL = $_SERVER['SERVER_PORT'] != '80' ? $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"] : $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];return $pageURL;}

	include('../lay_out/header.php');
?>
		<h2>All Students</h2>
		<ul>
			<?php
				while($row = mysqli_fetch_assoc($Students))
				{
					echo "<li>".$row["Name"];
					echo " <a href='delete.php?redirect=".CurrentPageURL()."&delete=Student&id=".$row["idStudent"]."'>Delete</a>";
					echo " <a href='Student.php?id=".$row["idStudent"]."&name=".$row['Name']."'>Details</a>";
					echo "</li>";
				}
			?>
		</ul>
		
		<h2>All Skills </h2>
		<ul>
			<?php
				while($row = mysqli_fetch_assoc($Skills))
				{
					echo "<li>".$row["Skill"]." ".$row["Categorie"]." ".$row["SubCategorie"]."	MaxLevel:".$row['MaxLevel'];
					echo " <a href='delete.php?redirect=".CurrentPageURL()."&delete=Skill&id=".$row["idSkills"]."'>delete</a>";
					echo "</li>";
				}			
			
			?>		
		</ul>
		<h2>
<?php include('../lay_out/footer.php'); ?>