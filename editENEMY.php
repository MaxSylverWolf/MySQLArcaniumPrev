<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_enemy = $_POST["id_enemy"];
    $enemyname = $_POST["enemyname"];
    $lvl = $_POST["lvl"];
    $attack = $_POST["attack"];
    $defence = $_POST["defence"];
    $health = $_POST["health"];
    $mana = $_POST["mana"];
    $id_lot = $_POST["id_lot"];
    $id_area = $_POST["id_area"];
	$exp = $_POST["exp"];
    $gold = $_POST["gold"];
    $about = $_POST["about"];
    $stmt = $conn->prepare("UPDATE ENEMY SET enemyname=?, lvl=?, attack=?,
      defence=?, health=?, mana=?, id_lot=?, id_area=?, exp=?, gold=?, about=? 
	  WHERE id_enemy=?");

  $stmt->bind_param('sdddddddddsd', $enemyname, $lvl, $attack, $defence, $health, $mana, $id_lot, $id_area, $exp, $gold, $about, $id_enemy);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED ENEMY! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=ENEMY.php>ENEMY</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
