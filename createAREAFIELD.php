<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_area = 0;
    $namearea = $_POST["namearea"];
    $aboutarea= $_POST["aboutarea"];
    $entrancelvl = $_POST["entrancelvl"];
	
    $result = $conn->query("SELECT * FROM AREAFIELD WHERE id_area = (SELECT MAX(id_area) FROM AREAFIELD)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_area =$row["id_area"]+1;
	  
    }
	
    if($id_area != 0){
      $stmt = $conn->prepare("INSERT into AREAFIELD(id_area,namearea, aboutarea, entrancelvl) values(?,?, ?, ?)");
      $stmt->bind_param('dssd',  $id_area,$namearea, $aboutarea, $entrancelvl);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW AREAFIELD SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=AREAFIELD.php>AREAFIELD</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
