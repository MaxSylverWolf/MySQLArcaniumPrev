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
    $id_npc = $_POST["id_npc"];
	$id_item = $_POST["id_item"];	
    $stmt = $conn->prepare("UPDATE NPCITEMS SET id_npc=?, id_item=?
	  WHERE id=?");

  $stmt->bind_param('ddd', $id_npc, $id_item, $id);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED NPCITEM! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=NPCITEMS.php>NPCITEMS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
