<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id = $_POST["id"];
    $id_quest = $_POST["id_quest"];
	$id_char = $_POST["id_char"];
    $progress = $_POST["progress"];	
    $stmt = $conn->prepare("UPDATE QUESTCHARACTERS SET id_quest=?, id_char=?, progress=?
	  WHERE id=?");

  $stmt->bind_param('ddsd', $id_quest, $id_char, $progress, $id);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED QUESTCHARACTER! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=QUESTCHARACTERS.php>QUESTCHARACTERS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
