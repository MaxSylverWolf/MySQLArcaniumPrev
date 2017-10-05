<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_mount = 0;
    $mountname = $_POST["mountname"];
    $id_skill= $_POST["id_skill"];
    $mountdefence = $_POST["mountdefence"];
	$mountattack= $_POST["mountattack"];
	
    $result = $conn->query("SELECT * FROM MOUNTS WHERE id_mount = (SELECT MAX(id_mount) FROM MOUNTS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_mount =$row["id_mount"]+1;
	  
    }
	
    if($id_mount != 0){
      $stmt = $conn->prepare("INSERT into MOUNTS(id_mount,mountname, id_skill, mountdefence, mountattack) values(?,?, ?, ?, ?)");
      $stmt->bind_param('dsddd',  $id_mount,$mountname, $id_skill, $mountdefence, $mountattack);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW MOUNTS SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=MOUNTS.php>MOUNTS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
