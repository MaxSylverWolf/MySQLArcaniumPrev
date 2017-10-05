<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id = 0;
    $id_quest = $_POST["id_quest"];
    $id_char= $_POST["id_char"];
    $progress = $_POST["progress"];	
	
    $result = $conn->query("SELECT * FROM QUESTCHARACTERS WHERE id = (SELECT MAX(id) FROM QUESTCHARACTERS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id =$row["id"]+1;
	  
    }
	
    if($id != 0){
      $stmt = $conn->prepare("INSERT into QUESTCHARACTERS(id,id_quest, id_char, progress) values(?,?, ?, ?)");
      $stmt->bind_param('ddds',  $id,$id_quest, $id_char, $progress);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW QUESTCHARACTERS SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=QUESTCHARACTERS.php>QUESTCHARACTERS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
