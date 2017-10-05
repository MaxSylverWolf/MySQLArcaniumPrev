<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_eq = $_POST["id_eq"];
    $id_char = $_POST["id_char"];
    $id_weapon = $_POST["id_weapon"];
    $id_armor = $_POST["id_armor"];
    $id_helmet = $_POST["id_helmet"];
    $id_pants = $_POST["id_pants"];
    $id_gloves = $_POST["id_gloves"];
    $id_shoes = $_POST["id_shoes"];
    $id_shield = $_POST["id_shield"];
	$id_necklace = $_POST["id_necklace"];
    $id_ring = $_POST["id_ring"];
    $id_wings = $_POST["id_wings"];
	$id_cloak = $_POST["id_cloak"];
    $id_else = $_POST["id_else"];
    $stmt = $conn->prepare("UPDATE EQ SET id_char=?, id_weapon=?, id_armor=?,
      id_helmet=?, id_pants=?, id_gloves=?, id_shoes=?, id_shield=?, id_necklace=?, id_ring=?, id_wings=?, 
	  id_cloak=?, id_else=? WHERE id_eq=?");

  $stmt->bind_param('dddddddddddddd', $id_char, $id_weapon, $id_armor, $id_helmet, $id_pants, $id_gloves, $id_shoes, $id_shield, $id_necklace, $id_ring, $id_wings, $id_cloak, $id_else, $id_eq);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED EQ! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=EQ.php>EQ</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
