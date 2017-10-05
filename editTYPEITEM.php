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
    $itemname = $_POST["itemname"];
    $stmt = $conn->prepare("UPDATE AREAFIELD SET itemname=?
	  WHERE id_type=?");

  $stmt->bind_param('sd', $itemname, $id_type);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED TYPEITEM! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=TYPEITEM.php>TYPEITEM</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
