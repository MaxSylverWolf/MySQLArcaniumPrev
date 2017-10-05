<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_eq=0;
    $id_char=0;
    $id_mount = $_POST["id_mount"];
    $id_area= $_POST["id_area"];
    $id_class = $_POST["id_class"];
    $id_guild = $_POST["id_guild"];
    $id_pet = $_POST["id_pet"];
    $exp = $_POST["exp"];
    $lvl = $_POST["lvl"];
    $charname = $_POST["charname"];
    $attack= $_POST["attack"];
    $defence = $_POST["defence"];
    $inte = $_POST["inte"];
    $health = $_POST["health"];
    $mana = $_POST["mana"];
    $stamina = $_POST["stamina"];	
    $gold = $_POST["gold"];
	
	
    $stmt = $conn->prepare("INSERT into EQ(id_weapon, id_armor, id_helmet, id_pants, id_gloves, id_shoes, id_shield, id_necklace, id_ring, id_wings, id_cloak, id_else) values
                          (null, null, null, null, null, null, null, null, null, null, null, null)");
    $stmt->execute();

    if($stmt){
		
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED EQ FOR NEW CHARACTER! </th></tr>";
echo "</table>";
echo '</center>';		
    
      $result = $conn->query("SELECT * FROM EQ WHERE id_eq = (SELECT MAX(id_eq) FROM EQ)");

      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $id_eq =$row["id_eq"];
						
      }
    }

         $result = $conn->query("SELECT * FROM CHARACTERS WHERE id_char = (SELECT MAX(id_char) FROM CHARACTERS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_char =$row["id_char"]+1;
	  
    }

    if($id_eq != 0){
      $stmt = $conn->prepare("INSERT into CHARACTERS(id_char,id_mount, id_eq, id_area, id_class, id_guild, id_pet, exp, lvl, charname, attack, defence, inte, health, mana, stamina, gold) values(?,?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param('dddddddddsddddddd',  $id_char,$id_mount, $id_eq, $id_area, $id_class, $id_guild, $id_pet, $exp, $lvl, $charname, $attack, $defence, $inte, $health, $mana, $stamina, $gold );
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW CHARACTER WITH EQ SUCCES!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=char.php>CHARACTERS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
