<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_quest = $_POST["id_quest"];
    $aboutquest = $_POST["aboutquest"];
	$lvlquest = $_POST["lvlquest"];
    $id_lot = $_POST["id_lot"];
	$id_area = $_POST["id_area"];	
    $stmt = $conn->prepare("UPDATE QUESTS SET aboutquest=?, lvlquest=?, id_lot=?, id_area=?
	  WHERE id_quest=?");

  $stmt->bind_param('sdddd', $aboutquest, $lvlquest, $id_lot, $id_area, $id_quest);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED QUEST! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=QUESTS.php>QUESTS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
