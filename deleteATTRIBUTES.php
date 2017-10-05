<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_attr = $_POST["id_attr"];

    $stmt = $conn->prepare("DELETE FROM ATTRIBUTES WHERE id_attr=$id_attr");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=ATTRIBUTES.php>ATTRIBUTES</a></th></tr>";
echo "</table>";
echo '</center>';
?>
