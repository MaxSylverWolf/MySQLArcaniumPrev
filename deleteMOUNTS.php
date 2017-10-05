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

    $stmt = $conn->prepare("DELETE FROM MOUNTS WHERE id_mount=$id_mount");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=MOUNTS.php>MOUNTS</a></th></tr>";
echo "</table>";
echo '</center>';
?>
