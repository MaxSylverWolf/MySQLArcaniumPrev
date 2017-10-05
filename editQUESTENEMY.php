<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id = $_POST["id"];
    $id_quest = $_POST["id_quest"];
	$id_enemy = $_POST["id_enemy"];
    $gold = $_POST["gold"];	
    $stmt = $conn->prepare("UPDATE QUESTENEMY SET id_quest=?, id_enemy=?, gold=?
	  WHERE id=?");

  $stmt->bind_param('dddd', $id_quest, $id_enemy, $gold, $id);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED QUESTENEMY! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=QUESTENEMY.php>QUESTENEMY</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
