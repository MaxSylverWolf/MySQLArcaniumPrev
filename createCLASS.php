<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_class = 0;
    $nameclass = $_POST["nameclass"];
    $about= $_POST["about"];
    $id_attr = $_POST["id_attr"];
	$id_skill1= $_POST["id_skill1"];
    $id_skill2= $_POST["id_skill2"];
    $id_skill3 = $_POST["id_skill3"];
	$id_skill4= $_POST["id_skill4"];	
	
    $result = $conn->query("SELECT * FROM CLASS WHERE id_class = (SELECT MAX(id_class) FROM CLASS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_class =$row["id_class"]+1;
	  
    }
	
    if($id_class != 0){
      $stmt = $conn->prepare("INSERT into CLASS(id_class,nameclass, about, id_attr, id_skill1, id_skill2, id_skill3, id_skill4) values(?,?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param('dssddddd',  $id_class,$nameclass, $about, $id_attr, $id_skill1, $id_skill2, $id_skill3, $id_skill4);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW CLASS SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=CLASS.php>CLASS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
