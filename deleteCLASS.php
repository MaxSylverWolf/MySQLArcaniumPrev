<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_class = $_POST["id_class"];

    $stmt = $conn->prepare("DELETE FROM CLASS WHERE id_class=$id_class");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=CLASS.php>CLASS</a></th></tr>";
echo "</table>";
echo '</center>';
?>
