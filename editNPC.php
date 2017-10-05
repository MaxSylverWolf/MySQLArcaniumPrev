<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_npc = $_POST["id_npc"];
    $npcname = $_POST["npcname"];
	$gold = $_POST["gold"];
    $aboutnpc = $_POST["aboutnpc"];
	$id_area = $_POST["id_area"];	
    $stmt = $conn->prepare("UPDATE NPC SET npcname=?, gold=?, aboutnpc=?, id_area=?
	  WHERE id_npc=?");

  $stmt->bind_param('sdsdd', $npcname, $gold, $aboutnpc, $id_area, $id_npc);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED NPC! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=NPC.php>NPC</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
