<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {

    $username= $_POST["username"];
    $pass = $_POST["pass"];
	$email= $_POST["email"];
	$birth = $_POST["birth"];
				
      $stmt = $conn->prepare("INSERT into USERLOGIN(username, pass, email, birth) values(?,?, ?, ?)");
      $stmt->bind_param('ssss', $username, $pass, $email, $birth);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW USER SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    	

  } 

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=loginuser.html>LOGIN PAGE</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>