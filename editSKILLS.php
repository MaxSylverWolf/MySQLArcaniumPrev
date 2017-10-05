<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_skill = $_POST["id_skill"];
    $skill = $_POST["skill"];
    $skill_attack = $_POST["skill_attack"];
    $skill_buff = $_POST["skill_buff"];
    $stmt = $conn->prepare("UPDATE AREAFIELD SET skill=?, skill_attack=?, skill_buff=?
	  WHERE id_skill=?");

  $stmt->bind_param('sddd', $skill, $skill_attack, $skill_buff, $id_skill);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED SKILL! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=SKILLS.php>SKILLS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
