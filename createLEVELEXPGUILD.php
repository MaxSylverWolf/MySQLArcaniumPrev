<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $lvl = 0;
    $exp = $_POST["exp"];
	
    $result = $conn->query("SELECT * FROM LEVELEXPGUILD WHERE lvl = (SELECT MAX(lvl) FROM LEVELEXPGUILD)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $lvl =$row["lvl"]+1;
	  
    }
	
    if($lvl != 0){
      $stmt = $conn->prepare("INSERT into LEVELEXPGUILD(lvl,exp) values(?,?)");
      $stmt->bind_param('dd'  $lvl,$exp);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW LEVELEXPGUILD SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=LEVELEXPGUILD.php>LEVELEXPGUILD</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
