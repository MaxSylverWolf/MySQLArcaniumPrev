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
    $id_enemy = $_POST["id_enemy"];
	$id_char = $_POST["id_char"];
    $isWin = $_POST["isWin"];	
	$id_item = $_POST["id_item"];
    $stmt = $conn->prepare("UPDATE BATTLE SET id_char=?, id_enemy=?, isWin=?, id_item=?
	  WHERE id=?");

  $stmt->bind_param('ddbdd', $id_char, $id_enemy, $isWin, $id_item $id);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED BATTLE! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=BATTLE.php>BATTLE</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
