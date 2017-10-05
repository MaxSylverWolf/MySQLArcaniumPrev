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
    $stmt = $conn->prepare("UPDATE CHARITEM SET id_item=?
	  WHERE id_char=?");

  $stmt->bind_param('dd', $id_item, $id_char);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED CHARITEM! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=CHARITEM.php>CHARITEM</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
