<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_npc = 0;
    $npcname = $_POST["npcname"];
    $gold= $_POST["gold"];
    $aboutnpc = $_POST["aboutnpc"];	
	$id_area = $_POST["id_area"];
	
    $result = $conn->query("SELECT * FROM NPC WHERE id_npc = (SELECT MAX(id_npc) FROM NPC)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_npc =$row["id_npc"]+1;
	  
    }
	
    if($id_npc != 0){
      $stmt = $conn->prepare("INSERT into NPC(id_npc,npcname, gold, aboutnpc, id_area) values(?,?, ?, ?, ?)");
      $stmt->bind_param('dsdsd',  $id_npc,$npcname, $gold, $aboutnpc, $id_area);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW NPC SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=NPC.php>NPC</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
