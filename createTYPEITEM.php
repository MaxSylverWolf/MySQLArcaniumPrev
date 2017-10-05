<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_type = 0;
    $itemname = $_POST["itemname"];
	
    $result = $conn->query("SELECT * FROM TYPEITEM WHERE id_type = (SELECT MAX(id_type) FROM TYPEITEM)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_type =$row["id_type"]+1;
	  
    }
	
    if($id_type != 0){
      $stmt = $conn->prepare("INSERT into TYPEITEM(id_type,itemname) values(?,?)");
      $stmt->bind_param('ds',  $id_type,$itemname);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW TYPEITEM SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=TYPEITEM.php>TYPEITEM</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
