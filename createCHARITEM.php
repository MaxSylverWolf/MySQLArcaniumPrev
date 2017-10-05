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
		
    if($id_char != 0){
      $stmt = $conn->prepare("INSERT into CHARITEM(id_char,id_item) values(?,?)");
      $stmt->bind_param('ds',  $id_char,$id_item);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW CHARITEM SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=CHARITEM.php>CHARITEM</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
