<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_area = $_POST["id_area"];
    $namearea = $_POST["namearea"];
    $aboutarea = $_POST["aboutarea"];
    $entrancelvl = $_POST["entrancelvl"];
    $stmt = $conn->prepare("UPDATE AREAFIELD SET namearea=?, aboutarea=?, entrancelvl=?
	  WHERE id_area=?");

  $stmt->bind_param('ssdd', $namearea, $aboutarea, $entrancelvl, $id_area);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED AREAFIELD! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=AREAFIELD.php>AREAFIELD</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
