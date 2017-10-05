<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_type = $_POST["id_type"];

    $stmt = $conn->prepare("DELETE FROM TYPEITEM WHERE id_type=$id_type");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=TYPEITEM.php>TYPEITEM</a></th></tr>";
echo "</table>";
echo '</center>';
?>
