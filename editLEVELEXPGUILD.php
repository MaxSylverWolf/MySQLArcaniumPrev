<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $lvl = $_POST["lvl"];
    $exp = $_POST["exp"];
	
    $stmt = $conn->prepare("UPDATE LEVELEXPGUILD SET exp=?
	  WHERE lvl=?");

  $stmt->bind_param('dd', $exp, $lvl);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED LEVELEXPGUILD! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=LEVELEXPGUILD.php>LEVELEXPGUILD</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
