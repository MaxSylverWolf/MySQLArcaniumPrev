<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $username = $_POST["username"];
    $pass = $_POST["pass"];
	
	if($username=="admin") {
		
		if($pass=="admin") {
			
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=char.php>WELCOME INTO DATABASE</a></td></th></tr>";
echo "</table>";
echo '</center>';	
	}

	}		
				
  $conn->close();
  }
?>
