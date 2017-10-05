<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_guild = $_POST["id_guild"];
    $lvl = $_POST["lvl"];
    $nameguild = $_POST["nameguild"];
    $aboutguild = $_POST["aboutguild"];
    $entrancelvl = $_POST["entrancelvl"];
	
    $stmt = $conn->prepare("UPDATE GUILDS SET lvl=?, nameguild=?, aboutguild=?, entrancelvl=?, id_skill2=?, id_skill3=?, id_skill4=?
	  WHERE id_guild=?");

  $stmt->bind_param('dssdd', $lvl, $nameguild, $aboutguild, $entrancelvl, $id_guild);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED GUILD! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=GUILDS.php>GUILDS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
