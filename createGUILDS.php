<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_guild = 0;
    $lvl = $_POST["lvl"];
    $nameguild= $_POST["nameguild"];
    $aboutguild = $_POST["aboutguild"];	
	$entrancelvl = $_POST["entrancelvl"];
	
    $result = $conn->query("SELECT * FROM GUILDS WHERE id_guild = (SELECT MAX(id_guild) FROM GUILDS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_guild =$row["id_guild"]+1;
	  
    }
	
    if($id_guild != 0){
      $stmt = $conn->prepare("INSERT into GUILDS(id_guild,lvl, nameguild, aboutguild, entrancelvl) values(?,?, ?, ?, ?)");
      $stmt->bind_param('ddssd',  $id_guild,$lvl, $nameguild, $aboutguild, $entrancelvl);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW GUILD SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=GUILDS.php>GUILDS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
