<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_eq = $_POST["id_eq"];
	$id_char = $_POST["id_char"];
    $stmt = $conn->prepare("DELETE FROM EQ WHERE id_eq=$id_eq and id_char=$id_char");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=EQ.php>EQ</a></th></tr>";
echo "</table>";
echo '</center>';
?>
