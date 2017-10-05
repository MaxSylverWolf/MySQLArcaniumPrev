<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_npc = $_POST["id_npc"];

    $stmt = $conn->prepare("DELETE FROM NPC WHERE id_npc=$id_npc");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=NPC.php>NPC</a></th></tr>";
echo "</table>";
echo '</center>';
?>
