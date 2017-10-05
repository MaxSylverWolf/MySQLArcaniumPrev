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
    $id_char = $_POST["id_char"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $birth = $_POST["birth"];
    $stmt = $conn->prepare("UPDATE USERLOGIN SET id_char=?, username=?, pass=?, email=?, birth=? 
	  WHERE id=?");

  $stmt->bind_param('dssssd', $id_char, $username, $pass, $email, $birth, $id);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED USERLOGIN! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=USERLOGIN.php>USERLOGIN</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
