<?php include 'css.css';
echo '<center>';
echo "<table>";
echo "<tr><th>Table name: CLASS</th></tr>";
echo "</table>";
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia: " . $conn->connect_error;
  }
  else
  {
  $sql = "SELECT * FROM CLASS";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
  echo "<table>";
  echo
  "<tr>
	<th>id_class</th>
	<th>nameclass</th>
	<th>about</th>
	<th>id_attr</th>
	<th>id_skill1</th>
	<th>id_skill2</th>
	<th>id_skill3</th>
	<th>id_skill4</th>	
  </tr>";
  while($row = $result->fetch_assoc()) {
    echo
    "<tr>";
    	echo
      "<td>" . $row["id_class"]. "</td> 	  
      <td>" . $row["nameclass"]. "</td> 	
      <td>" . $row["about"]. "</td>
      <td>" . $row["id_attr"]. "</td>
      <td>" . $row["id_skill1"]. "</td>
      <td>" . $row["id_skill2"]. "</td>
      <td>" . $row["id_skill3"]. "</td>	  
	  <td>" . $row["id_skill4"]. "</td>"; 
	  echo "</tr>";
	}
echo "</table>";
}
else
{
 echo "brak wynikow";
}
$conn->close();
}
echo  "<a  href=createCLASS.html><img src=CREATE.png  /></a>";
echo  "<a  href=readCLASS.php><img src=READ.png  /></a>";
echo  "<a  href=editCLASS.html><img src=UPDATE.png  /></a>";
echo  "<a  href=deleteCLASS.html><img src=DELETE.png  /></a>";

echo "<table>";
echo "<tr><th>TABLES</th>
<th>TABLES</th><th>TABLES</th><th>TABLES</th></tr>
<tr><td><a href=char.php>CHARACTERS</a></td>
<td><a href=USERLOGIN.php>USERLOGIN</a></td>
<td><a href=MOUNTS.php>MOUNTS</a></td>
<td><a href=PETS.php>PETS</a></td></tr>
<tr><td><a href=EQ.php>EQ</a></td>
<td><a href=ITEMS.php>ITEMS</a></td>
<td><a href=TYPEITEM.php>TYPEITEM</a></td>
<td><a href=CHARITEM.php>CHARITEM</a></td></tr>
<tr><td><a href=AREAFIELD.php>AREAFIELD</a></td>
<td><a href=CLASS.php>CLASS</a></td>
<td><a href=SKILLS.php>SKILLS</a></td>
<td><a href=GUILDS.php>GUILDS</a></td></tr>
<td><a href=LEVELEXP.php>LEVELEXP</a></td>
<td><a href=LEVELEXPGUILD.php>LEVELEXPGUILD</a></td>
<td><a href=ATTRIBUTES.php>ATTRIBUTES</a></td>
<td><a href=ENEMY.php>ENEMY</a></td></tr>
<tr><td><a href=NPC.php>NPC</a></td>
<td><a href=NPCITEMS.php>NPCITEMS</a></td>
<td><a href=QUESTS.php>QUESTS</a></td></tr>
<tr><td><a href=QUESTENEMY.php>QUESTENEMY</a></td>
<td><a href=QUESTCHARACTERS.php>QUESTCHARACTERS</a></td>
<td><a href=BATTLE.php>BATTLE</a></td>";
echo "</tr>";

echo "</table>";

echo "<table>";
echo "<tr><th>>>>--- ARCANIUM PROJECT --- <<<</th></tr>";
echo "</table>";

echo "<table>";
echo "<tr><th><a href=index.html>INDEX</a></th></tr>";
echo "</table>";
echo '</center>';
?>