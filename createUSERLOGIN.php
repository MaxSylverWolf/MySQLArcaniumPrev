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
    $id_char = $_POST["id_char"];
    $username= $_POST["username"];
    $pass = $_POST["pass"];
	$email= $_POST["email"];
	$birth = $_POST["birth"];
	
    $result = $conn->query("SELECT * FROM USERLOGIN WHERE id = (SELECT MAX(id) FROM USERLOGIN)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id =$row["id"]+1;
	  
    }
	
    if($id != 0){
      $stmt = $conn->prepare("INSERT into USERLOGIN(id,id_char, username, pass, email, birth) values(?,?, ?, ?, ?, ?)");
      $stmt->bind_param('ddssss',  $id,$id_char, $username, $pass, $email, $birth);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW USERLOGIN SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=USERLOGIN.php>USERLOGIN</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
