<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id = $_POST["id"];

    $stmt = $conn->prepare("DELETE FROM BATTLE WHERE id=$");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=BATTLE.php>BATTLE</a></th></tr>";
echo "</table>";
echo '</center>';
?>
