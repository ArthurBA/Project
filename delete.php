<?php
	error_reporting(E_ALL ^ E_NOTICE);
	if(isset($_GET['action']) && $_GET['action']=="add")
	{
		$id = intval($_GET['id']);
		if(isset($_SESSION['cart'][$id]))
		{
			$_SESSION['cart'][$id]['quantity']++;	
		}
		else
		{
			$sql_s = "SELECT * FROM products WHERE pro_id=$id";
			$query_s = mysql_query($sql_s);
			
			if(mysql_num_rows($query_s) != 0)
			{
				$row_s = mysql_fetch_array($query_s);
				$_SESSION['cart'][$row_s['pro_id']]=array("quantity" => 1,"price" => $row_s['pro_price']);
			}
			else
			{
				$message = "This product id does not exist.";
			}
			
		}
	}

?>
<h1>Product List</h1>
<?php
	if(isset($message))
	{
		echo "<h2>$message</h2>";
	}
?>
            <table>
            	<tr>
                	<th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
					
					$sql = "SELECT * FROM products ORDER BY pro_name ASC";
					$query = mysql_query($sql);
					
					while($row=mysql_fetch_array($query))
					{	
				?>
                	<tr>
                    	<td><?php echo $row['pro_name'] ?></td>
                        <td><?php echo $row['pro_desc'] ?></td>
                        <td><?php echo 'R'.$row['pro_price'] ?></td>
                        <td><a href="deleteProduct.php?page=deleteProduct&action=add&id=<?php echo $row['pro_id'] ?>">Select</a></td>
                    </tr>
                <?php
					}
				?>
            </table>
