<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_pet = $_POST["id_pet"];
    $petname = $_POST["petname"];
    $id_skill = $_POST["id_skill"];
    $petdefence = $_POST["petdefence"];
    $mountattack = $_POST["mountattack"];
    $stmt = $conn->prepare("UPDATE PETS SET petname=?, id_skill=?, petdefence=?, petattack=?
	  WHERE id_pet=?");

  $stmt->bind_param('sdddd', $petname, $id_skill, $petdefence, $petattack, $id_pet);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED PET! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=PETS.php>PETS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
