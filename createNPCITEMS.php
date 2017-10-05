<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id = 0;
    $id_npc = $_POST["id_npc"];
    $id_item= $_POST["id_item"];
	
    $result = $conn->query("SELECT * FROM NPCITEMS WHERE id = (SELECT MAX(id) FROM NPCITEMS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id =$row["id"]+1;
	  
    }
	
    if($id != 0){
      $stmt = $conn->prepare("INSERT into NPCITEMS(id,id_npc, id_item) values(?,?, ?)");
      $stmt->bind_param('ddd',  $id,$id_npc, $id_item);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW NPCITEMS SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=NPCITEMS.php>NPCITEMS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
