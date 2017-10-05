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
    $id_char = $_POST["id_char"];
    $id_enemy= $_POST["id_enemy"];
    $isWin = $_POST["isWin"];	
	$id_item = $_POST["id_item"];
	
    $result = $conn->query("SELECT * FROM BATTLE WHERE id = (SELECT MAX(id) FROM BATTLE)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id =$row["id"]+1;
	  
    }
	
    if($id != 0){
      $stmt = $conn->prepare("INSERT into BATTLE(id,id_char, id_enemy, isWin,id_item ) values(?,?, ?, ?, ?)");
      $stmt->bind_param('dddbd',  $id,$id_char, $id_enemy, $isWin, $id_item);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW BATTLE SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=BATTLE.php>BATTLE</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
