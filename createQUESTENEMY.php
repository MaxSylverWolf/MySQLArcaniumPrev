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
    $id_quest = $_POST["id_quest"];
    $id_enemy= $_POST["id_enemy"];
    $gold = $_POST["gold"];	
	
    $result = $conn->query("SELECT * FROM QUESTENEMY WHERE id = (SELECT MAX(id) FROM QUESTENEMY)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id =$row["id"]+1;
	  
    }
	
    if($id != 0){
      $stmt = $conn->prepare("INSERT into QUESTENEMY(id,id_quest, id_enemy, gold) values(?,?, ?, ?)");
      $stmt->bind_param('dddd',  $id,$id_quest, $id_enemy, $gold);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW QUESTENEMY SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=QUESTENEMY.php>QUESTENEMY</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
