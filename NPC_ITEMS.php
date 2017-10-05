<?php include 'css.css';
echo '<center>';
echo "<table>";
echo "<tr><th>Table name: NPC ITEMS</th></tr>";
echo "</table>";
$conn = new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Bark polaczenia" . $conn->connect_error;
  }
  else
  {

  $id_npc = $_GET["id"];
  $stmt = $conn->prepare("select * from NPC, ITEMS, NPCITEMS
          where NPC.id_npc = NPCITEMS.id_npc
          and ITEMS.id_item = NPCITEMS.id_item
          and NPC.id_npc= ?");
  $stmt->bind_param('s', $id_npc);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>id</th><th>NPC</th><th>ITEMS</th><th>PRICE</th></tr>";
   while($row = $result->fetch_assoc()) {
    echo "<tr>";
	 echo "<td>" . $row["id_npc"]. "</td><td>" . $row["npcname"]. "</td><td>" . $row["itemname"]. "</td><td>" . $row["price"]. "</td>";
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
echo  "<a  href=createNPC.html><img src=CREATE.png  /></a>";
echo  "<a  href=readNPC.php><img src=READ.png  /></a>";
echo  "<a  href=editNPC.html><img src=UPDATE.png  /></a>";
echo  "<a  href=deleteNPC.html><img src=DELETE.png  /></a>";

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
