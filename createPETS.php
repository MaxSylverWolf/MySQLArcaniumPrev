<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_pet = 0;
    $petname = $_POST["petname"];
    $id_skill= $_POST["id_skill"];
    $petdefence = $_POST["petdefence"];
	$petattack= $_POST["petattack"];
	
    $result = $conn->query("SELECT * FROM PETS WHERE id_pet = (SELECT MAX(id_pet) FROM PETS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_pet =$row["id_pet"]+1;
	  
    }
	
    if($id_pet != 0){
      $stmt = $conn->prepare("INSERT into PETS(id_pet,petname, id_skill, petdefence, petattack) values(?,?, ?, ?, ?)");
      $stmt->bind_param('dsddd',  $id_pet,$petname, $id_skill, $petdefence, $petattack);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW PETS SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=PETS.php>PETS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
