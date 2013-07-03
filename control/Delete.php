<?php
	include('../Config/database.php');
	
	if(isset($_GET["delete"]) && isset($_GET["id"]))
	{
		if($_GET["delete"] == 'Skill')
		{
			$query = "DELETE FROM Skills WHERE idSkills ='".$_GET["id"]."'";
			mysqli_query($db, $query);
		}
		if($_GET["delete"] == 'Student')
		{
			$query = "DELETE FROM Students WHERE idStudent ='".$_GET["id"]."'";
			mysqli_query($db, $query);		
		}
		$redirect = $_GET["redirect"];
		header("Location: http://$redirect");
	}
	
?>