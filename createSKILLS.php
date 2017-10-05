<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_skill = 0;
    $skill = $_POST["skill"];
    $skill_attack= $_POST["skill_attack"];
    $skill_buff = $_POST["skill_buff"];	
	
    $result = $conn->query("SELECT * FROM SKILLS WHERE id_skill = (SELECT MAX(id_skill) FROM SKILLS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_skill =$row["id_skill"]+1;
	  
    }
	
    if($id_skill != 0){
      $stmt = $conn->prepare("INSERT into SKILLS(id_skill,skill, skill_attack, skill_buff,) values(?,?, ?, ?)");
      $stmt->bind_param('dsdd',  $id_skill,$skill, $skill_attack, $skill_buff);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW SKILL SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=SKILLS.php>SKILLS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
