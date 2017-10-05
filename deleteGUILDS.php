<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_guild = $_POST["id_guild"];

    $stmt = $conn->prepare("DELETE FROM GUILDS WHERE id_guild=$id_guild");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=GUILDS.php>GUILDS</a></th></tr>";
echo "</table>";
echo '</center>';
?>
