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
			$sql_s = "SELECT * FROM cust_order WHERE order_id=$id";
			$query_s = mysql_query($sql_s);
			
			if(mysql_num_rows($query_s) != 0)
			{
				$row_s = mysql_fetch_array($query_s);
				$_SESSION['cart'][$row_s['order_id']]=array("quantity" => 1,"price" => $row_s['order_price']);
			}
			else
			{
				$message = "This product id does not exist.";
			}
			
		}
	}

?>
<h1>Order List</h1>
<?php
	if(isset($message))
	{
		echo "<h2>$message</h2>";
	}
?>
            <table>
            	<tr>
                	<th>Customer Email</th>
                    <th>Quantity</th>
                    <th>Order Price</th>
                    <th>Action</th>
                </tr>
                <?php
					
					$sql = "SELECT * FROM cust_order ORDER BY order_id ASC";
					$query = mysql_query($sql);
					
					while($row=mysql_fetch_array($query))
					{	
				?>
                	<tr>
                    	<td><?php echo $row['cust_email'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo 'R'.$row['order_price'] ?></td>
                        <td><a href="sendMail.php?page=view_order&action=add&id=<?php echo $row['order_id'] ?>">Respond</a></td>
                    </tr>
                     <hr/>
                <?php
					}
				?>
            </table>