<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_quest = 0;
    $aboutquest = $_POST["aboutquest"];
    $lvlquest= $_POST["lvlquest"];
    $id_lot = $_POST["id_lot"];	
	$id_area = $_POST["id_area"];
	
    $result = $conn->query("SELECT * FROM QUESTS WHERE id_quest = (SELECT MAX(id_quest) FROM QUESTS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_quest =$row["id_quest"]+1;
	  
    }
	
    if($id_quest != 0){
      $stmt = $conn->prepare("INSERT into QUESTS(id_quest,aboutquest, lvlquest, id_lot, id_area) values(?,?, ?, ?, ?)");
      $stmt->bind_param('dsddd',  $id_quest,$aboutquest, $lvlquest, $id_lot, $id_area);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW QUEST SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=QUESTS.php>QUESTS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
