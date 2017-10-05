<?php include 'css.css';
$conn=new mysqli("localhost:3306","root","","Arcanium");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
    $id_item = 0;
    $itemname = $_POST["itemname"];
    $about= $_POST["about"];
    $id_type = $_POST["id_type"];
	$id_attr= $_POST["id_attr"];
	$price = $_POST["price"];
	
    $result = $conn->query("SELECT * FROM ITEMS WHERE id_item = (SELECT MAX(id_item) FROM ITEMS)");
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $id_item =$row["id_item"]+1;
	  
    }
	
    if($id_item != 0){
      $stmt = $conn->prepare("INSERT into ITEMS(id_item,itemname, about, id_type, id_attr, price) values(?,?, ?, ?, ?, ?)");
      $stmt->bind_param('dssddd',  $id_item,$itemname, $about, $id_type, $id_attr, $price);
      $stmt->execute();
      $result = $stmt->get_result();

      if($stmt){
		  
echo '<center>';
echo "<table>";
echo "<tr><th>CREATED NEW ITEM SUCCESS!!</th></tr>";
echo "</table>";
echo '</center>';		  
      }
    }	

  }

  $conn->close();

echo '<center>';
echo "<table>";
echo "<tr><th><td><a href=ITEMS.php>ITEMS</a></td></th></tr>";
echo "</table>";
echo '</center>';
?>
