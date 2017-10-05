<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_area = $_POST["id_area"];

    $stmt = $conn->prepare("DELETE FROM AREAFIELD WHERE id_area=$id_area");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=AREAFIELD.php>AREAFIELD</a></th></tr>";
echo "</table>";
echo '</center>';
?>
