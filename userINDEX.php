<?php include 'css.css';
session_start();

$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia: " . $conn->connect_error;
  }
  else
  {
echo '<center>';
echo "<table>";
echo "<tr><th>Logged as:</th><th>". $_SESSION["username"] ."</th></tr>";
echo "</table>";
echo "</br>";
echo "</br>";
echo "<table><tr><td><a href=createUserChar.html>CREATE CHARACTER HERE</a></td></tr></table>";
echo "</br>";
echo "</br>";
echo "<table><tr><td>ABOUT YOUR ACCOUNT (Create a char if you see nothing)</td></tr></table>";	

$username = $_SESSION["username"];

 $sql = "SELECT * FROM USERLOGIN, CHARACTERS where CHARACTERS.id_char = USERLOGIN.id and username='".$_SESSION["username"]."'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
  echo "<table>";
  echo
  "<tr>
    <th>username</th>
	<th>charname</th>
	<th>pass</th>
	<th>email</th>
	<th>birth</th>
  </tr>";
  while($row = $result->fetch_assoc()) {
    echo
    "<tr>";
    	echo
      "
	  <td>" . $row["username"]. "</td>
	  <td>" . $row["charname"]. "</td>	  
	  <td>" . $row["pass"]. "</td>
	  <td>" . $row["email"]. "</td>
	  <td>" . $row["birth"]. "</td>";	  
	  echo "</tr>";
	}
echo "</table>";
}
else
{
 echo "NO ENTRIES";
}

echo "</br>";
echo "</br>";
echo "<table><tr><td>HEROES AT WORLD</td></tr></table>";	
$username = $_SESSION["username"];
  $sql = "SELECT * FROM CHARACTERS,CLASS,USERLOGIN,PETS,MOUNTS,GUILDS,AREAFIELD where CHARACTERS.id_class = CLASS.id_class and USERLOGIN.id = CHARACTERS.id_char and PETS.id_pet = CHARACTERS.id_pet and MOUNTS.id_mount = CHARACTERS.id_mount and GUILDS.id_guild = CHARACTERS.id_guild and AREAFIELD.id_area = CHARACTERS.id_area";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
  echo "<table>";
  echo
  "<tr>
	<th>username</th>
  	<th>charname</th>
	<th>pet</th>
	<th>mount</th>
	<th>guild</th>
	<th>area</th>
	<th>nameclass</th>
	<th>aboutclass</th>	
	<th>exp</th>
    <th>lvl</th>
	<th>attack</th>
	<th>defence</th>
	<th>inte</th>
	<th>health</th>
	<th>mana</th>
	<th>stamina</th>
    <th>gold</th>
  </tr>";
  while($row = $result->fetch_assoc()) {
    echo
    "<tr>";
    	echo
      "<td>" . $row["username"]. "</td>
	  <td>" . $row["charname"]. "</td>	
	  <td>" . $row["petname"]. "</td>
	  <td>" . $row["mountname"]. "</td>
	  <td>" . $row["nameguild"]. "</td>
	  <td>" . $row["namearea"]. "</td>	  
	  <td>" . $row["nameclass"]. "</td>
	  <td>" . $row["about"]. "</td>	  
	  <td>" . $row["exp"]. "</td>
	  <td>" . $row["lvl"]. "</td>
	  <td>" . $row["attack"]. "</td>
	  <td>" . $row["defence"]. "</td>
	  <td>" . $row["inte"]. "</td>
	  <td>" . $row["health"]. "</td>
	  <td>" . $row["mana"]. "</td>
	  <td>" . $row["stamina"]. "</td>
	  <td>" . $row["gold"]. "</td>";
	  echo "</tr>";
	}
echo "</table>";
}
else
{
 echo "brak wynikow";
}

echo "</br>";
echo "</br>";
echo "<table><tr><td><a href=logout.php>LOGOUT</a></td></tr></table>";

echo '</center>';
$conn->close();
}

?>
