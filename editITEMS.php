<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_item = $_POST["id_item"];
    $itemname = $_POST["itemname"];
    $about = $_POST["about"];
    $id_attr = $_POST["id_attr"];
    $id_type = $_POST["id_type"];
    $stmt = $conn->prepare("UPDATE ITEMS SET itemname=?, about=?, id_type=?, id_attr=?, price=?
	  WHERE id_item=?");

  $stmt->bind_param('ssdddd', $itemname, $about, $id_type, $id_attr, $price, $id_item);
    $stmt->execute();
    $result = $stmt->get_result();
	
  
echo '<center>';
echo "<table>";
echo "<tr><th>UPDATED ITEM! </th></tr>";
echo "</table>";
echo '</center>';		

 
  $conn->close();
  }
echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=ITEMS.php>ITEMS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
