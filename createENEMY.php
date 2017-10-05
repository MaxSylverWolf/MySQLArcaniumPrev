<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_enemy = 0;
    $enemyname = $_POST["enemyname"];
    $lvl= $_POST["lvl"];
    $attack = $_POST["attack"];	
	$defence = $_POST["defence"];
	$health = $_POST["health"];
	$mana = $_POST["mana"];
	$id_lot = $_POST["id_lot"];
	$id_area = $_POST["id_area"];
	$exp = $_POST["exp"];
	$gold = $_POST["gold"];
	$about = $_POST["about"];
	
    $result = $conn->query("SELECT * FROM ENEMY WHERE id_enemy = (SELECT MAX(id_enemy) FROM ENEMY)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_enemy =$row["id_enemy"]+1;
	  
    }
	
    if($id_enemy != 0){
      $stmt = $conn->prepare("INSERT into ENEMY(id_enemy,enemyname, lvl, attack, defence, health, mana, id_lot, id_area, exp, gold, about) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param('dsddddddddds',  $id_enemy,$enemyname, $lvl, $attack, $defence, $health, $mana, $id_lot, $id_area, $exp, $gold, $about);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW ENEMY SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=ENEMY.php>ENEMY</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
