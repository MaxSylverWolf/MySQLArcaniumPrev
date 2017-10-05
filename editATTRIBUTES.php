<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_attr = $_POST["id_attr"];
    $attr_name = $_POST["attr_name"];
	$attr_value = $_POST["attr_value"];
	
    $stmt = $conn->prepare("UPDATE ATTRIBUTES SET attr_name=?, attr_value=?
	  WHERE id_attr=?");

  $stmt->bind_param('sdd', $attr_name, $attr_value, $id_attr);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED ATTRIBUTE! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=ATTRIBUTES.php>ATTRIBUTES</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
