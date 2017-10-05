<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_class = $_POST["id_class"];
    $nameclass = $_POST["nameclass"];
    $about = $_POST["about"];
    $id_attr = $_POST["id_attr"];
    $id_skill1 = $_POST["id_skill1"];
    $id_skill2 = $_POST["id_skill2"];
    $id_skill3 = $_POST["id_skill3"];
    $id_skill4 = $_POST["id_skill4"];
	
    $stmt = $conn->prepare("UPDATE CLASS SET nameclass=?, about=?, id_attr=?, id_skill1=?, id_skill2=?, id_skill3=?, id_skill4=?
	  WHERE id_class=?");

  $stmt->bind_param('ssdddddd', $nameclass, $about, $id_attr, $id_skill1, $id_skill2, $id_skill3, $id_skill4, $id_class);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED CLASS! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=CLASS.php>CLASS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
