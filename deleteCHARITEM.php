<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_char = $_POST["id_char"];
	$id_item = $_POST["id_item"];

    $stmt = $conn->prepare("DELETE FROM CHARITEM WHERE id_char=$id_char and id_item = $id_item");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=CHARITEM.php>CHARITEM</a></th></tr>";
echo "</table>";
echo '</center>';
?>
