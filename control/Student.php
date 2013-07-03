<?php	
	include('../Config/database.php');
	
	if(isset($_GET['id']) == false && isset($_GET['name'])==false) 
	{
		echo "false";
	} else {
	
	class Skill
	{
		public $id;
		public $name;
		public $lvl;
		public $categorie;
		public $subCategorie;
	}
	
	$studentId = $_GET['id'];
	$Student = mysqli_query($db, "SELECT * FROM Students 
								  INNER JOIN StudentsSkills
								  ON Students.idStudent = StudentsSkills.Students_idStudent 
								  INNER JOIN Skills
								  ON StudentsSkills.Skills_idSkills = Skills.idSkills
								  WHERE Students.idStudent = $studentId");
								  
	$_Skills = mysqli_query($db, "SELECT * FROM Skills");
	
	if(isset($_POST['Skill']))
	{
		$idSkill = $_POST['Skill'];
		$idStudent = $_GET['id'];
		mysqli_query($db, "INSERT INTO StudentsSkills(Skills_idSkills, Students_idStudent,Level) VALUES('$idSkill','$idStudent','1')");
		header("Location: Student.php?id=$idStudent&name=".$_GET['name']);
	}
	if(isset($_GET['student'])&&isset($_GET['delete']))
	{
		$skill = $_GET["delete"];
		mysqli_query($db, "DELETE FROM StudentsSkills WHERE Skills_idSkills='$skill'");		
		header("Location: Student.php?id=".$_GET['id']."&name=".$_GET['name']);
	}
	
	$skills = array();
	while($row = mysqli_fetch_assoc($_Skills))
	{
		$obj = new Skill;
		$obj->id = $row['idSkills']; $obj->name = $row['Name']; $obj->lvl = $row['MaxLevel']; $obj->categorie = $row['Categorie']; $obj->subCategorie = $row['SubCategorie'];
		array_push($skills, $obj);
	}		
	
	include('../lay_out/header.php');
	
	$studentSkills = array();
	if(mysqli_num_rows($Student)!=0)
	{
		while($row = mysqli_fetch_assoc($Student))
		{
			$obj = new Skill;
			$obj->id = $row['idSkills']; $obj->name = $row['Skill']; $obj->lvl = $row['Level']; $obj->categorie = $row['Categorie']; $obj->subCategorie = $row['SubCategorie'];
			array_push($studentSkills, $obj);
		}		
	}
	?>
	<h2>Student <?php echo $_GET['name']; ?> </h2>
	<ul>
		<?php
			foreach($studentSkills as $skill)
			{
				echo "<li>$skill->name, $skill->categorie, $skill->subCategorie, level: $skill->lvl <a href='Student.php?id=".$_GET['id']."&name=".$_GET['name']."&delete=$skill->id&student=".$_GET['id']."'> delete </a></li>";
			}
		?>
	</ul>
	
	<h2>Add Skill</h2>
	<form Method="POST" action="Student.php<?php echo "?id=".$_GET['id']."&name=".$_GET['name'];?>">	
		<select name="Skill">
			<?php 
				foreach($skills as $skill)
				{
					echo "<option  value='$skill->id'>$skill->name</option>";
				}
			?>
		</select>
		<input type="submit" name="add" value="Add" />
	</form>
	
	
	<?php }include('../lay_out/footer.php');?>