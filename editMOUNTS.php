<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_mount = $_POST["id_mount"];
    $mountname = $_POST["mountname"];
    $id_skill = $_POST["id_skill"];
    $mountdefence = $_POST["mountdefence"];
    $mountattack = $_POST["mountattack"];
    $stmt = $conn->prepare("UPDATE MOUNTS SET mountname=?, id_skill=?, mountdefence=?, mountattack=?
	  WHERE id_mount=?");

  $stmt->bind_param('sdddd', $mountname, $id_skill, $mountdefence, $mountattack, $id_mount);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED MOUNT! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=MOUNTS.php>MOUNTS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
