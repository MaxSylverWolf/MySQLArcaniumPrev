<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_quest = $_POST["id_quest"];

    $stmt = $conn->prepare("DELETE FROM QUESTS WHERE id_quest=$id_quest");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=QUESTS.php>QUESTS</a></th></tr>";
echo "</table>";
echo '</center>';
?>
