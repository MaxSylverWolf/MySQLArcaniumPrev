<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_attr = 0;
    $attr_name = $_POST["attr_name"];
	$attr_value = $_POST["attr_value"];
	
    $result = $conn->query("SELECT * FROM ATTRIBUTES WHERE id_attr = (SELECT MAX(id_attr) FROM ATTRIBUTES)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_attr =$row["id_attr"]+1;
	  
    }
	
    if($id_attr != 0){
      $stmt = $conn->prepare("INSERT into ATTRIBUTES(id_attr,attr_name,attr_value) values(?,?)");
      $stmt->bind_param('dsd',$id_attr,$attr_name, $attr_value);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW ATTRIBUTE SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=ATTRIBUTES.php>ATTRIBUTES</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
