<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_char = $_POST["id_char"];
    $id_mount = $_POST["id_mount"];
    $id_eq = $_POST["id_eq"];
    $id_area = $_POST["id_area"];
    $id_class = $_POST["id_class"];
    $id_guild = $_POST["id_guild"];
    $id_pet = $_POST["id_pet"];
    $exp = $_POST["exp"];
    $lvl = $_POST["lvl"];
    $charname = $_POST["charname"];
    $attack = $_POST["attack"];
    $defence = $_POST["defence"];
    $inte = $_POST["inte"];
    $health = $_POST["health"];
    $mana = $_POST["mana"];
    $stamina = $_POST["stamina"];
    $gold = $_POST["gold"];
    $stmt = $conn->prepare("UPDATE CHARACTERS SET id_mount=?, id_eq=?, id_area=?,
      id_class=?, id_guild=?, id_pet=?, exp=?, lvl=?, charname=?, attack=?, defence=?, 
	  inte=?, health=?, mana=?, stamina=?, gold=? WHERE id_char=?");

  $stmt->bind_param('ddddddddsdddddddd', $id_mount, $id_eq, $id_area, $id_class, $id_guild, $id_pet, $exp, $lvl, $charname, $attack, $defence, $inte, $health, $mana, $stamina, $gold, $id_char);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED CHARACTER! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=char.php>CHARACTERS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
