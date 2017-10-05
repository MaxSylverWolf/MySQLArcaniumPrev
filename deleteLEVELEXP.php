<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $lvl = $_POST["lvl"];

    $stmt = $conn->prepare("DELETE FROM LEVELEXP WHERE lvl=$lvl");

    $stmt->execute();
    $result = $stmt->get_result();

}

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><a href=LEVELEXP.php>LEVELEXP</a></th></tr>";
echo "</table>";
echo '</center>';
?>
